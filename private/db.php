<?php
// Shared helpers: config + SQLite connection
function setu_config(): array {
    static $cfg = null;
    if ($cfg === null) { $cfg = require __DIR__ . '/config.php'; }
    return $cfg;
}

function setu_db(): PDO {
    static $pdo = null;
    if ($pdo) return $pdo;
    $path = setu_config()['db_path'];
    $dir = dirname($path);
    if (!is_dir($dir)) { mkdir($dir, 0770, true); }
    $pdo = new PDO('sqlite:' . $path, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    $pdo->exec('PRAGMA journal_mode = WAL');
    $pdo->exec('CREATE TABLE IF NOT EXISTS enquiries (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
        enquiry_no  TEXT UNIQUE,
        name        TEXT NOT NULL,
        mobile      TEXT NOT NULL,
        email       TEXT,
        interest    TEXT,
        message     TEXT,
        demo_date   TEXT,
        status      TEXT NOT NULL DEFAULT \'New\',
        remarks     TEXT,
        ip          TEXT,
        user_agent  TEXT,
        created_at  TEXT NOT NULL,
        updated_at  TEXT
    )');
    $pdo->exec('CREATE INDEX IF NOT EXISTS idx_enq_created ON enquiries(created_at)');
    return $pdo;
}

function h($v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

const SETU_STATUSES = ['New', 'Contacted', 'Demo Scheduled', 'Converted', 'Closed'];
