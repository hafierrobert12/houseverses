<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>House of Verses – Pencarian Buku</title>
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
  .nav-bar a:hover, .nav-bar a.active {
    background: var(--gold); color: #0e0907; border-color: var(--gold);
  }

  .card {
    background: var(--card-bg); border-radius: 24px; padding: 48px 44px;
    width: 100%; max-width: 480px;
    box-shadow: 0 40px 100px rgba(0,0,0,.6), 0 0 0 1px rgba(212,168,67,.15);
  }
  .card-title {
    font-family: 'Playfair Display', serif; font-size: 1.7rem;
    font-weight: 700; color: #0d1120; margin-bottom: 6px;
  }
  .card-sub { font-size: 0.83rem; color: #8896b3; margin-bottom: 28px; }

  .fg { margin-bottom: 16px; }
  label {
    display: block; font-size: 0.72rem; font-weight: 700;
    color: #5a6580; margin-bottom: 5px; letter-spacing: .06em; text-transform: uppercase;
  }
  input[type=number], select {
    width: 100%; padding: 11px 14px; border: 1.5px solid #e4e8f2;
    border-radius: 10px; font-family: 'Nunito', sans-serif;
    font-size: 0.87rem; color: #0d1120; background: #f8faff;
    outline: none; transition: border-color .2s, box-shadow .2s;
  }
  input[type=number]:focus, select:focus {
    border-color: var(--accent); background: #fff;
    box-shadow: 0 0 0 3px rgba(74,124,255,.12);
  }

  .op-grid {
    display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;
    margin-bottom: 20px;
  }
  .op-option { display: none; }
  .op-label {
    display: flex; align-items: center; justify-content: center;
    gap: 8px; padding: 12px; border: 1.5px solid #e4e8f2;
    border-radius: 12px; cursor: pointer; font-size: 0.85rem;
    font-weight: 600; color: #5a6580; transition: all .2s;
  }
  .op-option:checked + .op-label {
    border-color: var(--accent); background: rgba(74,124,255,.07);
    color: var(--accent);
  }
  .op-icon { font-size: 1.1rem; }

  .btn-hitung {
    width: 100%; padding: 13px; background: linear-gradient(135deg, #4a7cff, #7b5ea7);
    color: #fff; border: none; border-radius: 12px; font-family: 'Nunito', sans-serif;
    font-size: 0.95rem; font-weight: 800; cursor: pointer; letter-spacing: .03em;
    transition: opacity .2s, transform .15s;
  }
  .btn-hitung:hover { opacity: .9; transform: translateY(-1px); }
  .btn-hitung:active { transform: translateY(0); }
</style>
</head>
<body>

<nav class="nav-bar">
  <a href="index.php">Katalog</a>
  <a href="kalkulator.php" class="active">Pencarian</a>
  <a href="login.php">Login</a>
  <a href="crud.php">Kelola Buku</a>
</nav>

<div class="card">
  <div class="card-title">Filter Koleksi</div>
  <div class="card-sub">Masukkan dua angka dan pilih operasi untuk menyaring koleksi</div>

  <form action="hasil.php" method="POST">
    <div class="fg">
      <label>Bilangan Pertama (misal: nomor rak awal)</label>
      <input type="number" name="bil1" placeholder="Contoh: 10" required>
    </div>

    <div class="fg">
      <label>Bilangan Kedua (misal: nomor rak akhir)</label>
      <input type="number" name="bil2" placeholder="Contoh: 50" required>
    </div>

    <div class="fg">
      <label>Pilih Operasi</label>
      <div class="op-grid">
        <input type="radio" name="operasi" value="tambah" id="op1" class="op-option" required>
        <label for="op1" class="op-label"><span class="op-icon">➕</span> Tambah</label>

        <input type="radio" name="operasi" value="kurang" id="op2" class="op-option">
        <label for="op2" class="op-label"><span class="op-icon">➖</span> Kurang</label>

        <input type="radio" name="operasi" value="kali" id="op3" class="op-option">
        <label for="op3" class="op-label"><span class="op-icon">✖️</span> Kali</label>

        <input type="radio" name="operasi" value="bagi" id="op4" class="op-option">
        <label for="op4" class="op-label"><span class="op-icon">➗</span> Bagi</label>
      </div>
    </div>

    <button type="submit" class="btn-hitung">Hitung Sekarang</button>
  </form>
</div>

</body>
</html>
