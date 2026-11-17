<?php
// Contact form endpoint: validates and saves an enquiry, returns JSON.
require __DIR__ . '/../../private/db.php';
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

function reply(int $code, array $body) { http_response_code($code); echo json_encode($body); exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') reply(405, ['ok' => false, 'error' => 'Method not allowed']);

// Spam trap: bots fill the hidden "website" field
if (trim($_POST['website'] ?? '') !== '') reply(200, ['ok' => true, 'id' => 'SETU-0']);

$clean = fn($k, $max) => mb_substr(trim(strip_tags((string)($_POST[$k] ?? ''))), 0, $max);
$name     = $clean('name', 100);
$mobile   = $clean('mobile', 20);
$email    = $clean('email', 150);
$interest = $clean('interest', 100);
$message  = $clean('message', 3000);
$demo     = $clean('demo_date', 10);

$digits = preg_replace('/\D/', '', $mobile);
if ($name === '')                                  reply(422, ['ok' => false, 'error' => 'Please enter your name.']);
if (strlen($digits) < 10 || strlen($digits) > 13)  reply(422, ['ok' => false, 'error' => 'Please enter a valid mobile number.']);
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) reply(422, ['ok' => false, 'error' => 'Please enter a valid email or leave it blank.']);
if ($interest === '')                              reply(422, ['ok' => false, 'error' => 'Please select what you are interested in.']);
if ($message === '')                               reply(422, ['ok' => false, 'error' => 'Please write your message.']);
if ($demo !== '' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $demo)) $demo = '';

$ip = $_SERVER['REMOTE_ADDR'] ?? '';
try {
    $db = setu_db();

    // Max 5 enquiries per IP in 10 minutes
    $q = $db->prepare('SELECT COUNT(*) FROM enquiries WHERE ip = ? AND created_at > ?');
    $q->execute([$ip, date('Y-m-d H:i:s', time() - 600)]);
    if ((int)$q->fetchColumn() >= 5) reply(429, ['ok' => false, 'error' => 'Too many enquiries. Please call or WhatsApp us.']);

    $now = date('Y-m-d H:i:s');
    $ins = $db->prepare('INSERT INTO enquiries (name, mobile, email, interest, message, demo_date, ip, user_agent, created_at)
                         VALUES (?,?,?,?,?,?,?,?,?)');
    $ins->execute([$name, $mobile, $email, $interest, $message, $demo, $ip,
                   mb_substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255), $now]);
    $rowId = (int)$db->lastInsertId();
    $no = 'SETU-' . date('ymd') . '-' . str_pad((string)$rowId, 4, '0', STR_PAD_LEFT);
    $db->prepare('UPDATE enquiries SET enquiry_no = ? WHERE id = ?')->execute([$no, $rowId]);
} catch (Throwable $e) {
    error_log('SETU enquiry save failed: ' . $e->getMessage());
    reply(500, ['ok' => false, 'error' => 'Could not save right now. Please call or WhatsApp us.']);
}

// Reply to the visitor first, then send the email alert (so the form stays fast)
echo json_encode(['ok' => true, 'id' => $no]);
if (function_exists('fastcgi_finish_request')) fastcgi_finish_request();

$cfg = setu_config();
if (!empty($cfg['notify_email']) && !empty($cfg['smtp']['pass'])) {
    require __DIR__ . '/../../private/smtp.php';
    $body = "New website enquiry: $no\n\n"
          . "Name: $name\nMobile: $mobile\nEmail: " . ($email ?: '-') . "\nInterested in: $interest\n"
          . "Preferred demo date: " . ($demo ?: '-') . "\nReceived: " . date('d M Y, h:i A', strtotime($now)) . "\n\n"
          . "Message:\n$message\n\n"
          . "WhatsApp: https://wa.me/" . (strlen($digits) === 10 ? '91' . $digits : $digits) . "\n";
    $res = setu_smtp_send($cfg['smtp'], $cfg['notify_email'], "New enquiry $no – $name ($interest)", $body, $email);
    if ($res !== true) error_log('SETU enquiry email failed: ' . $res);
}
exit;
