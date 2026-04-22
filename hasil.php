<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>House of Verses – Hasil Perhitungan</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&family=Playfair+Display:ital,wght@0,500;0,700;1,500&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #0e0907; --gold: #d4a843; --parchment: #c8a96e;
    --off-white: #f5ead8; --muted: #8a7a60; --accent: #4a7cff;
    --card-bg: rgba(255,255,255,0.97);
  }
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    background: var(--bg); font-family: 'Nunito', sans-serif;
    min-height: 100vh; display: flex; flex-direction: column;
    align-items: center; justify-content: center; padding: 40px 20px;
  }

  .nav-bar {
    display: flex; justify-content: center; gap: 12px;
    margin-bottom: 36px; flex-wrap: wrap;
  }
  .nav-bar a {
    padding: 8px 20px; border-radius: 20px; text-decoration: none;
    font-size: 0.82rem; font-weight: 700; letter-spacing: .04em;
    border: 1.5px solid rgba(212,168,67,0.3); color: var(--parchment);
    transition: all .2s;
  }
  .nav-bar a:hover { background: var(--gold); color: #0e0907; border-color: var(--gold); }

  .card {
    background: var(--card-bg); border-radius: 24px; padding: 48px 44px;
    width: 100%; max-width: 480px; text-align: center;
    box-shadow: 0 40px 100px rgba(0,0,0,.6), 0 0 0 1px rgba(212,168,67,.15);
  }

  .result-icon { font-size: 3rem; margin-bottom: 16px; }
  .result-label {
    font-size: 0.75rem; font-weight: 700; color: #8896b3;
    letter-spacing: .1em; text-transform: uppercase; margin-bottom: 10px;
  }
  .result-equation {
    font-family: 'Playfair Display', serif; font-size: 1.3rem;
    color: #1a1f36; margin-bottom: 20px; font-weight: 500;
  }
  .result-value {
    font-size: 3.5rem; font-weight: 800; color: var(--accent);
    font-family: 'Nunito', sans-serif; line-height: 1; margin-bottom: 8px;
  }
  .result-desc { font-size: 0.82rem; color: #8896b3; margin-bottom: 32px; }

  .divider {
    height: 1px; background: #e4e8f2; margin: 24px 0;
  }

  .detail-box {
    background: #f8faff; border-radius: 12px; padding: 16px 20px;
    text-align: left; margin-bottom: 28px;
  }
  .detail-row {
    display: flex; justify-content: space-between; align-items: center;
    font-size: 0.83rem; padding: 4px 0;
  }
  .detail-row span:first-child { color: #8896b3; }
  .detail-row span:last-child { font-weight: 700; color: #0d1120; }

  .error-box {
    background: #fff3f3; border: 1.5px solid #ffcccc;
    border-radius: 12px; padding: 16px 20px; margin-bottom: 28px;
    color: #c0392b; font-size: 0.85rem; font-weight: 600;
  }

  .btn-back {
    display: inline-block; padding: 12px 28px;
    background: linear-gradient(135deg, #4a7cff, #7b5ea7);
    color: #fff; border: none; border-radius: 12px; text-decoration: none;
    font-family: 'Nunito', sans-serif; font-size: 0.9rem; font-weight: 700;
    transition: opacity .2s;
  }
  .btn-back:hover { opacity: .85; }
</style>
</head>
<body>

<nav class="nav-bar">
  <a href="index.php">Katalog</a>
  <a href="kalkulator.php">Pencarian</a>
  <a href="login.php">Login</a>
  <a href="crud.php">Kelola Buku</a>
</nav>

<div class="card">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bil1    = $_POST['bil1'] ?? '';
  $bil2    = $_POST['bil2'] ?? '';
  $operasi = $_POST['operasi'] ?? '';

  $simbol = ['tambah' => '+', 'kurang' => '−', 'kali' => '×', 'bagi' => '÷'];
  $label  = ['tambah' => 'Penjumlahan', 'kurang' => 'Pengurangan', 'kali' => 'Perkalian', 'bagi' => 'Pembagian'];
  $icon   = ['tambah' => '➕', 'kurang' => '➖', 'kali' => '✖️', 'bagi' => '➗'];

  $sym = $simbol[$operasi] ?? '?';
  $lbl = $label[$operasi] ?? 'Operasi';
  $ico = $icon[$operasi] ?? '🔢';

  $error = false;
  $hasil = null;

  if ($operasi === 'bagi' && floatval($bil2) == 0) {
    $error = 'Tidak bisa membagi dengan nol. Silakan kembali dan coba lagi.';
  } else {
    switch ($operasi) {
      case 'tambah': $hasil = floatval($bil1) + floatval($bil2); break;
      case 'kurang': $hasil = floatval($bil1) - floatval($bil2); break;
      case 'kali':   $hasil = floatval($bil1) * floatval($bil2); break;
      case 'bagi':   $hasil = floatval($bil1) / floatval($bil2); break;
    }
  }

  if ($error) {
    echo "<div class='result-icon'>⚠️</div>";
    echo "<div class='error-box'>" . htmlspecialchars($error) . "</div>";
  } else {
    $formatted = (floor($hasil) == $hasil) ? number_format($hasil, 0) : number_format($hasil, 2);
    echo "<div class='result-icon'>" . $ico . "</div>";
    echo "<div class='result-label'>Hasil " . $lbl . "</div>";
    echo "<div class='result-equation'>" . htmlspecialchars($bil1) . " " . $sym . " " . htmlspecialchars($bil2) . " =</div>";
    echo "<div class='result-value'>" . $formatted . "</div>";
    echo "<div class='result-desc'>dari filter koleksi House of Verses</div>";
    echo "<div class='detail-box'>";
    echo "<div class='detail-row'><span>Bilangan 1</span><span>" . htmlspecialchars($bil1) . "</span></div>";
    echo "<div class='detail-row'><span>Bilangan 2</span><span>" . htmlspecialchars($bil2) . "</span></div>";
    echo "<div class='detail-row'><span>Operasi</span><span>" . $lbl . "</span></div>";
    echo "<div class='detail-row'><span>Hasil</span><span>" . $formatted . "</span></div>";
    echo "</div>";
  }
} else {
  echo "<div class='result-icon'>🚫</div>";
  echo "<div class='error-box'>Akses tidak valid. Silakan gunakan form kalkulator.</div>";
}
?>
  <a href="kalkulator.php" class="btn-back">← Kembali ke Form</a>
</div>

</body>
</html>
