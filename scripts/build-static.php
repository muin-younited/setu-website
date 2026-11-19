<?php
/**
 * Builds the PHP pages in public/ into static HTML inside dist/ for GitHub Pages.
 */

$rootDir   = dirname(__DIR__);
$publicDir = $rootDir . '/public';
$distDir   = $rootDir . '/dist';

function copyRecursive(string $src, string $dst): void {
    if (!is_dir($dst)) {
        mkdir($dst, 0775, true);
    }
    foreach (scandir($src) as $item) {
        if ($item === '.' || $item === '..') continue;
        $s = $src . '/' . $item;
        $d = $dst . '/' . $item;
        if (is_dir($s)) {
            copyRecursive($s, $d);
        } else {
            copy($s, $d);
        }
    }
}

if (!is_dir($distDir)) {
    mkdir($distDir, 0775, true);
}

$pages = [
    'index.php'     => 'index.html',
    'about.php'     => 'about.html',
    'products.php'  => 'products.html',
    'services.php'  => 'services.html',
    'solutions.php' => 'solutions.html',
    'team.php'      => 'team.html',
    'contact.php'   => 'contact.html',
];

$phpBin = PHP_BINARY ?: 'php';

foreach ($pages as $srcFile => $outFile) {
    $srcPath = $publicDir . '/' . $srcFile;
    $cmd = escapeshellarg($phpBin) . ' ' . escapeshellarg($srcPath);
    $html = shell_exec($cmd);
    if ($html === null || $html === false || trim($html) === '') {
        fwrite(STDERR, "Failed to render {$srcFile}\n");
        exit(1);
    }

    // Rewrite internal .php page links to clean extensionless URLs for GitHub Pages
    $html = str_replace('href="index.php"', 'href="./"', $html);
    $html = preg_replace(
        '/\b(about|products|services|solutions|team|contact)\.php\b/',
        '$1',
        $html
    );

    file_put_contents($distDir . '/' . $outFile, $html);
    echo "Built dist/{$outFile}\n";
}

// Copy static assets and SEO files
copyRecursive($publicDir . '/assets', $distDir . '/assets');
if (is_dir($publicDir . '/.well-known')) {
    copyRecursive($publicDir . '/.well-known', $distDir . '/.well-known');
}

$staticFiles = ['robots.txt', 'sitemap.xml', 'llms.txt', 'llms-full.txt'];
foreach ($staticFiles as $file) {
    if (is_file($publicDir . '/' . $file)) {
        $content = file_get_contents($publicDir . '/' . $file);
        if ($file === 'sitemap.xml') {
            $content = preg_replace(
                '/\b(about|products|services|solutions|team|contact)\.php\b/',
                '$1',
                $content
            );
        }
        file_put_contents($distDir . '/' . $file, $content);
    }
}

// Prevent GitHub Pages from running Jekyll processing
file_put_contents($distDir . '/.nojekyll', '');
echo "Static build complete in dist/\n";
