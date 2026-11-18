<?php
// Minimal SMTP sender (Gmail-compatible), no external libraries needed.
// Returns true on success, or an error string.
function setu_smtp_send(array $smtp, string $to, string $subject, string $body, string $replyTo = '') {
    if (empty($smtp['host']) || empty($smtp['user']) || empty($smtp['pass'])) return 'SMTP not configured';

    $port = (int)$smtp['port'];
    $secure = $smtp['secure'] ?? ($port === 587 ? 'tls' : 'ssl'); // 'ssl' (465), 'tls' (587) or '' (testing only)
    if ($port === 587 && $secure === 'ssl') $secure = 'tls';
    if ($port === 465 && $secure === 'tls') $secure = 'ssl';
    $remote = ($secure === 'ssl' ? 'ssl://' : 'tcp://') . $smtp['host'] . ':' . $port;
    $sslOpts = ['verify_peer' => true, 'verify_peer_name' => true, 'peer_name' => $smtp['host']];
    $caFile = ini_get('openssl.cafile') ?: (openssl_get_cert_locations()['default_cert_file'] ?? '');
    if (!$caFile || !is_file($caFile)) {
        $wampCa = 'C:/wamp64/apps/phpmyadmin5.2.3/vendor/composer/ca-bundle/res/cacert.pem';
        if (is_file($wampCa)) $sslOpts['cafile'] = $wampCa;
        else { $sslOpts['verify_peer'] = false; $sslOpts['verify_peer_name'] = false; }
    }
    $ctx = stream_context_create(['ssl' => $sslOpts]);
    $fp = @stream_socket_client($remote, $errno, $errstr, 15, STREAM_CLIENT_CONNECT, $ctx);
    if (!$fp) return "Connect failed: $errstr";
    stream_set_timeout($fp, 15);

    $read = function () use ($fp) {
        $data = '';
        while (($line = fgets($fp, 515)) !== false) { $data .= $line; if (isset($line[3]) && $line[3] === ' ') break; }
        return $data;
    };
    $cmd = function ($line, $expect) use ($fp, $read) {
        if ($line !== null) fwrite($fp, $line . "\r\n");
        $resp = $read();
        if ((int)substr($resp, 0, 3) !== $expect) throw new RuntimeException(trim($resp) ?: 'No response');
        return $resp;
    };

    try {
        $host = gethostname() ?: 'localhost';
        $cmd(null, 220);
        $cmd("EHLO $host", 250);
        if ($secure === 'tls') {
            $cmd('STARTTLS', 220);
            $crypto = STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT | (defined('STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT') ? STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT : 0);
            if (!stream_socket_enable_crypto($fp, true, $crypto)) throw new RuntimeException('STARTTLS failed');
            $cmd("EHLO $host", 250);
        }
        $cmd('AUTH LOGIN', 334);
        $cmd(base64_encode($smtp['user']), 334);
        $cmd(base64_encode(str_replace(' ', '', $smtp['pass'])), 235);

        $from = $smtp['user'];
        $cmd("MAIL FROM:<$from>", 250);
        $cmd("RCPT TO:<$to>", 250);
        $cmd('DATA', 354);

        $enc = fn($s) => '=?UTF-8?B?' . base64_encode($s) . '?=';
        $headers = [
            'Date: ' . date('r'),
            'From: ' . $enc($smtp['from_name'] ?? 'Website') . " <$from>",
            "To: <$to>",
            'Subject: ' . $enc($subject),
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'Content-Transfer-Encoding: base64',
            'Message-ID: <' . bin2hex(random_bytes(8)) . '@' . $smtp['host'] . '>',
        ];
        if ($replyTo !== '' && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) $headers[] = "Reply-To: <$replyTo>";
        $msg = implode("\r\n", $headers) . "\r\n\r\n" . chunk_split(base64_encode($body));
        $cmd($msg . "\r\n.", 250);
        $cmd('QUIT', 221);
        fclose($fp);
        return true;
    } catch (Throwable $e) {
        @fwrite($fp, "QUIT\r\n"); @fclose($fp);
        return 'SMTP error: ' . $e->getMessage();
    }
}
