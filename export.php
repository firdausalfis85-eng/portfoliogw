<?php
/**
 * export.php
 * Script untuk mengekspor website PHP menjadi file HTML statis (index.html)
 * agar bisa langsung dideploy ke GitHub Pages / Vercel / Netlify.
 */

ob_start();
require __DIR__ . '/index.php';
$html = ob_get_clean();

// Simpan sebagai index.html di direktori root project
file_put_contents(__DIR__ . '/index.html', $html);

echo "✅ Berhasil mengekspor ke index.html (" . number_format(strlen($html)) . " bytes)\n";
