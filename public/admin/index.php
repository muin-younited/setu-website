<?php
// Admin: view enquiries, update status/remarks, export CSV.
require __DIR__ . '/../../private/db.php';
date_default_timezone_set('Asia/Kolkata');
session_set_cookie_params(['httponly' => true, 'samesite' => 'Strict', 'secure' => !empty($_SERVER['HTTPS'])]);
session_start();
header('X-Frame-Options: DENY');
header('X-Robots-Tag: noindex, nofollow');

$cfg = setu_config();
$hash = $cfg['admin_password_hash'];
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(16));
$csrf = $_SESSION['csrf'];
$error = '';

// ---- login / logout ----
if (isset($_GET['logout'])) { session_destroy(); header('Location: ./'); exit; }
if (($_POST['action'] ?? '') === 'login') {
    $_SESSION['tries'] = ($_SESSION['tries'] ?? 0) + 1;
    if ($_SESSION['tries'] > 10) { $error = 'Too many attempts. Close the browser and try later.'; }
    elseif ($hash && password_verify($_POST['password'] ?? '', $hash)) {
        session_regenerate_id(true); $_SESSION['admin'] = true; $_SESSION['tries'] = 0;
        header('Location: ./'); exit;
    } else { sleep(1); $error = $hash ? 'Wrong password.' : 'Admin password is not set in private/config.php yet.'; }
}
$logged = !empty($_SESSION['admin']);

if ($logged) {
    $db = setu_db();

    // ---- update status ----
    if (($_POST['action'] ?? '') === 'update' && hash_equals($csrf, $_POST['csrf'] ?? '')) {
        $st = in_array($_POST['status'] ?? '', SETU_STATUSES, true) ? $_POST['status'] : 'New';
        $db->prepare('UPDATE enquiries SET status = ?, remarks = ?, updated_at = ? WHERE id = ?')
           ->execute([$st, mb_substr(trim($_POST['remarks'] ?? ''), 0, 1000), date('Y-m-d H:i:s'), (int)$_POST['id']]);
        header('Location: ./?' . http_build_query(['status' => $_GET['status'] ?? '', 'q' => $_GET['q'] ?? ''])); exit;
    }

    // ---- test email ----
    $mailMsg = '';
    if (($_POST['action'] ?? '') === 'testmail' && hash_equals($csrf, $_POST['csrf'] ?? '')) {
        require __DIR__ . '/../../private/smtp.php';
        if (empty($cfg['smtp']['pass'])) {
            $mailMsg = 'Gmail App Password is not set in private/config.php (smtp → pass).';
        } else {
            $res = setu_smtp_send($cfg['smtp'], $cfg['notify_email'], 'SETU website – test email',
                "Email alerts are working.\nNew enquiries will arrive at this address.\n\nSent: " . date('d M Y, h:i A'));
            $mailMsg = $res === true ? 'Test email sent to ' . $cfg['notify_email'] . '. Check inbox (and Spam once).' : $res;
        }
    }

    // ---- filters ----
    $fStatus = in_array($_GET['status'] ?? '', SETU_STATUSES, true) ? $_GET['status'] : '';
    $fQ = trim($_GET['q'] ?? '');
    $where = []; $args = [];
    if ($fStatus) { $where[] = 'status = ?'; $args[] = $fStatus; }
    if ($fQ !== '') { $where[] = '(name LIKE ? OR mobile LIKE ? OR email LIKE ? OR enquiry_no LIKE ? OR message LIKE ?)'; array_push($args, ...array_fill(0, 5, "%$fQ%")); }
    $sql = 'SELECT * FROM enquiries' . ($where ? ' WHERE ' . implode(' AND ', $where) : '') . ' ORDER BY id DESC';

    // ---- CSV export ----
    if (isset($_GET['export'])) {
        $st = $db->prepare($sql); $st->execute($args);
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="setu-enquiries-' . date('Y-m-d') . '.csv"');
        $out = fopen('php://output', 'w'); fwrite($out, "\xEF\xBB\xBF");
        fputcsv($out, ['Enquiry No', 'Date', 'Name', 'Mobile', 'Email', 'Interested In', 'Message', 'Demo Date', 'Status', 'Remarks']);
        // Prefix risky leading chars so Excel never treats a cell as a formula
        $safe = fn($v) => preg_match('/^[=+\-@\t\r]/', (string)$v) ? "'" . $v : $v;
        foreach ($st as $r) fputcsv($out, array_map($safe, [$r['enquiry_no'], $r['created_at'], $r['name'], $r['mobile'], $r['email'], $r['interest'], $r['message'], $r['demo_date'], $r['status'], $r['remarks']]));
        exit;
    }

    $st = $db->prepare($sql . ' LIMIT 300'); $st->execute($args); $rows = $st->fetchAll();
    $counts = [];
    foreach ($db->query('SELECT status, COUNT(*) c FROM enquiries GROUP BY status') as $r) $counts[$r['status']] = (int)$r['c'];
}
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Enquiries – SETU Admin</title>
<style>
:root{--ink:#102f59;--muted:#52657d;--line:#d5e2f0;--bg:#f4f8fd;--brand:#123d70}
*{box-sizing:border-box;font-family:'Times New Roman',Times,serif}
body{margin:0;font-family:'Times New Roman',Times,serif;background:var(--bg);color:#182e48}
.bar{background:var(--ink);color:#fff;padding:14px 20px;display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
.bar a{color:#dce8f7}
.wrap{max-width:1280px;margin:0 auto;padding:20px}
.login{max-width:360px;margin:12vh auto;background:#fff;border:1px solid var(--line);border-radius:14px;padding:28px}
label{display:block;font-weight:600;font-size:14px;margin:0 0 6px}
input,select,textarea{font:inherit;padding:10px;border:1px solid #bdcfe2;border-radius:8px;background:#fff;color:#182e48}
button,.btn{font:inherit;font-weight:700;border:0;border-radius:8px;padding:10px 16px;background:var(--brand);color:#fff;cursor:pointer;text-decoration:none;display:inline-block}
.btn.light{background:#fff;color:var(--brand);border:1px solid #b7cde4}
.err{color:#b3261e;font-weight:600}
.chips{display:flex;gap:8px;flex-wrap:wrap;margin:0 0 16px}
.chip{padding:8px 12px;border-radius:999px;border:1px solid #b7cde4;background:#fff;color:var(--ink);text-decoration:none;font-size:14px}
.chip.on{background:var(--ink);color:#fff;border-color:var(--ink)}
.filters{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.filters input{flex:1 1 240px}
.table{overflow-x:auto;background:#fff;border:1px solid var(--line);border-radius:12px}
table{width:100%;border-collapse:collapse;min-width:980px;font-size:14px}
th,td{padding:10px 12px;border-bottom:1px solid #e6eef7;text-align:left;vertical-align:top}
th{background:#eef4fb;color:var(--ink);font-size:13px}
td .msg{white-space:pre-wrap;max-width:320px;color:var(--muted)}
td form{display:flex;flex-direction:column;gap:6px;min-width:190px}
td textarea{min-height:44px;font-size:13px}
.st{display:inline-block;padding:3px 8px;border-radius:999px;font-size:12px;font-weight:700;background:#e0efff;color:#15518b}
.st.New{background:#fff1d6;color:#8a4b00}.st.Converted{background:#dff3e6;color:#0b6b33}.st.Closed{background:#eceff3;color:#4a5568}
.empty{padding:40px;text-align:center;color:var(--muted)}
</style>
</head>
<body>
<?php if (!$logged): ?>
  <form class="login" method="post">
    <h1 style="margin:0 0 18px;font-size:22px;color:var(--ink)">SETU Enquiries</h1>
    <input type="hidden" name="action" value="login">
    <label for="pw">Admin password</label>
    <input id="pw" type="password" name="password" required autofocus style="width:100%;margin-bottom:14px">
    <?php if ($error): ?><p class="err"><?= h($error) ?></p><?php endif; ?>
    <button type="submit" style="width:100%">Login</button>
  </form>
<?php else: ?>
  <div class="bar"><strong>SETU Digital Solutions · Enquiries</strong><a href="?logout=1">Logout</a></div>
  <div class="wrap">
    <nav class="chips" aria-label="Status filter">
      <a class="chip <?= $fStatus === '' ? 'on' : '' ?>" href="./">All (<?= array_sum($counts) ?>)</a>
      <?php foreach (SETU_STATUSES as $s): ?>
        <a class="chip <?= $fStatus === $s ? 'on' : '' ?>" href="?status=<?= urlencode($s) ?>"><?= h($s) ?> (<?= $counts[$s] ?? 0 ?>)</a>
      <?php endforeach; ?>
    </nav>
    <form class="filters" method="get">
      <input type="hidden" name="status" value="<?= h($fStatus) ?>">
      <label for="q" style="position:absolute;left:-9999px">Search</label>
      <input id="q" name="q" value="<?= h($fQ) ?>" placeholder="Search name, mobile, email, enquiry no.">
      <button type="submit">Search</button>
      <a class="btn light" href="?<?= h(http_build_query(['status' => $fStatus, 'q' => $fQ, 'export' => 1])) ?>">Export CSV</a>
    </form>
    <form method="post" style="margin:-4px 0 16px;display:flex;gap:10px;align-items:center;flex-wrap:wrap">
      <input type="hidden" name="action" value="testmail">
      <input type="hidden" name="csrf" value="<?= h($csrf) ?>">
      <button type="submit" class="btn light">Send test email</button>
      <span style="color:var(--muted);font-size:14px">Alerts go to <?= h($cfg['notify_email'] ?: '— (off)') ?></span>
      <?php if ($mailMsg): ?><strong style="font-size:14px;color:<?= str_starts_with($mailMsg, 'Test email sent') ? '#0b6b33' : '#b3261e' ?>"><?= h($mailMsg) ?></strong><?php endif; ?>
    </form>
    <div class="table">
    <?php if (!$rows): ?>
      <p class="empty">No enquiries yet.</p>
    <?php else: ?>
      <table>
        <thead><tr><th>Enquiry</th><th>Customer</th><th>Interested in</th><th>Message</th><th>Status &amp; remarks</th></tr></thead>
        <tbody>
        <?php foreach ($rows as $r): $wa = preg_replace('/\D/', '', $r['mobile']); if (strlen($wa) === 10) $wa = '91' . $wa; ?>
          <tr>
            <td><strong><?= h($r['enquiry_no']) ?></strong><br><span style="color:var(--muted)"><?= h(date('d M Y, h:i A', strtotime($r['created_at']))) ?></span><br><span class="st <?= h(str_replace(' ', '', $r['status'])) ?>"><?= h($r['status']) ?></span></td>
            <td><strong><?= h($r['name']) ?></strong><br>
              <a href="tel:<?= h($r['mobile']) ?>"><?= h($r['mobile']) ?></a> ·
              <a href="https://wa.me/<?= h($wa) ?>" target="_blank" rel="noopener">WhatsApp</a>
              <?php if ($r['email']): ?><br><a href="mailto:<?= h($r['email']) ?>"><?= h($r['email']) ?></a><?php endif; ?></td>
            <td><?= h($r['interest']) ?><?php if ($r['demo_date']): ?><br><span style="color:var(--muted)">Demo: <?= h(date('d M Y', strtotime($r['demo_date']))) ?></span><?php endif; ?></td>
            <td><div class="msg"><?= h($r['message']) ?></div></td>
            <td>
              <form method="post" action="?<?= h(http_build_query(['status' => $fStatus, 'q' => $fQ])) ?>">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="csrf" value="<?= h($csrf) ?>">
                <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                <label for="s<?= (int)$r['id'] ?>" style="position:absolute;left:-9999px">Status</label>
                <select id="s<?= (int)$r['id'] ?>" name="status">
                  <?php foreach (SETU_STATUSES as $s): ?><option <?= $r['status'] === $s ? 'selected' : '' ?>><?= h($s) ?></option><?php endforeach; ?>
                </select>
                <label for="rm<?= (int)$r['id'] ?>" style="position:absolute;left:-9999px">Remarks</label>
                <textarea id="rm<?= (int)$r['id'] ?>" name="remarks" placeholder="Remarks"><?= h($r['remarks']) ?></textarea>
                <button type="submit">Save</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
</body>
</html>
