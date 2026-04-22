<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>House of Verses – Login</title>
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
    width: 100%; max-width: 420px;
    box-shadow: 0 40px 100px rgba(0,0,0,.6), 0 0 0 1px rgba(212,168,67,.15);
  }

  .brand { display: flex; align-items: center; gap: 10px; margin-bottom: 28px; }
  .brand-icon {
    width: 38px; height: 38px;
    background: linear-gradient(135deg, #4a7cff, #7b5ea7);
    border-radius: 10px; display: flex; align-items: center;
    justify-content: center; font-size: 1.1rem;
    box-shadow: 0 4px 14px rgba(74,124,255,.4);
  }
  .brand-name {
    font-family: 'Playfair Display', serif; font-size: 1rem;
    font-weight: 700; color: #1a1f36;
  }
  .brand-name span { color: var(--accent); }

  .form-title {
    font-size: 1.65rem; font-weight: 800; color: #0d1120;
    letter-spacing: -.03em; margin-bottom: 6px;
  }
  .form-sub { font-size: 0.83rem; color: #8896b3; margin-bottom: 26px; line-height: 1.5; }

  /* Alert boxes */
  .alert {
    border-radius: 12px; padding: 13px 16px; margin-bottom: 20px;
    font-size: 0.83rem; font-weight: 600; display: flex; align-items: flex-start; gap: 8px;
  }
  .alert-success { background: #edfbf0; border: 1.5px solid #6fcf97; color: #1a7a3c; }
  .alert-danger  { background: #fff3f3; border: 1.5px solid #ffb3b3; color: #c0392b; }
  .alert-warning { background: #fffbea; border: 1.5px solid #f7d774; color: #856404; }
  .alert-icon { font-size: 1rem; flex-shrink: 0; margin-top: 1px; }

  .fg { margin-bottom: 14px; }
  label {
    display: block; font-size: 0.72rem; font-weight: 700;
    color: #5a6580; margin-bottom: 5px; letter-spacing: .06em; text-transform: uppercase;
  }
  input[type=text], input[type=password] {
    width: 100%; padding: 11px 14px; border: 1.5px solid #e4e8f2;
    border-radius: 10px; font-family: 'Nunito', sans-serif;
    font-size: 0.87rem; color: #0d1120; background: #f8faff;
    outline: none; transition: border-color .2s, box-shadow .2s;
  }
  input:focus {
    border-color: var(--accent); background: #fff;
    box-shadow: 0 0 0 3px rgba(74,124,255,.12);
  }
  input.input-error { border-color: #ff6b6b; background: #fff8f8; }

  .pw-wrap { position: relative; }
  .pw-wrap input { padding-right: 42px; }
  .pw-eye {
    position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer; font-size: 0.9rem;
    color: #b8c0d4; padding: 0; transition: color .2s;
  }
  .pw-eye:hover { color: var(--accent); }

  .hint-text {
    font-size: 0.72rem; color: #b8c0d4; margin-top: 20px;
    text-align: center; line-height: 1.6;
  }
  .hint-text b { color: #5a6580; }

  .btn-login {
    width: 100%; padding: 13px; margin-top: 6px;
    background: linear-gradient(135deg, #4a7cff, #7b5ea7);
    color: #fff; border: none; border-radius: 12px; font-family: 'Nunito', sans-serif;
    font-size: 0.95rem; font-weight: 800; cursor: pointer; letter-spacing: .03em;
    transition: opacity .2s, transform .15s;
  }
  .btn-login:hover { opacity: .9; transform: translateY(-1px); }

  .welcome-box {
    text-align: center; padding: 10px 0 20px;
  }
  .welcome-box .welcome-icon { font-size: 2.5rem; margin-bottom: 10px; }
  .welcome-box .welcome-name {
    font-family: 'Playfair Display', serif; font-size: 1.4rem;
    color: #0d1120; font-weight: 700; margin-bottom: 6px;
  }
  .welcome-box .welcome-role { font-size: 0.8rem; color: #8896b3; }

  .btn-logout {
    display: block; width: 100%; padding: 11px; margin-top: 24px;
    background: #f4f6fb; color: #5a6580; border: 1.5px solid #e4e8f2;
    border-radius: 12px; font-family: 'Nunito', sans-serif; font-size: 0.87rem;
    font-weight: 700; cursor: pointer; transition: all .2s;
  }
  .btn-logout:hover { background: #e4e8f2; color: #0d1120; }
</style>
</head>
<body>

<nav class="nav-bar">
  <a href="index.php">Katalog</a>
  <a href="kalkulator.php">Pencarian</a>
  <a href="login.php" class="active">Login</a>
  <a href="crud.php">Kelola Buku</a>
</nav>

<div class="card">
  <div class="brand">
    <div class="brand-icon">📚</div>
    <div class="brand-name">House of <span>Verses</span></div>
  </div>

<?php
// Data akun valid (hardcoded untuk demonstrasi)
$akun_valid = [
  'admin'     => 'admin123',
  'pustakawan' => 'buku2024',
  'user'      => 'password',
];

$status  = '';
$pesan   = '';
$input_id = '';
$input_pw_error = false;
$input_id_error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? 'login';

  if ($action === 'logout') {
    session_start();
    session_destroy();
    $status = 'logout';
    $pesan  = 'Kamu berhasil keluar. Sampai jumpa! 👋';
  } else {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $input_id = $username;

    // Kondisi 3: Input tidak lengkap
    if ($username === '' || $password === '') {
      $status = 'kosong';
      $pesan  = 'Input tidak lengkap. ID atau Password masih kosong.';
      $input_id_error = ($username === '');
      $input_pw_error = ($password === '');
    }
    // Cek akun
    elseif (isset($akun_valid[$username]) && $akun_valid[$username] === $password) {
      // Kondisi 1: Login sukses
      session_start();
      $_SESSION['user'] = $username;
      $status = 'sukses';
      $pesan  = 'Login berhasil! Selamat datang, ' . htmlspecialchars(ucfirst($username)) . ' 🎉';
    } else {
      // Kondisi 2: Login gagal
      $status = 'gagal';
      $pesan  = 'Login gagal. ID atau Password salah.';
      $input_id_error = true;
      $input_pw_error = true;
    }
  }
}

// Tampilkan alert sesuai status
if ($status === 'sukses') {
  echo "<div class='alert alert-success'><span class='alert-icon'>✅</span><div><b>Login Sukses</b><br>" . $pesan . "</div></div>";
  echo "<div class='welcome-box'>";
  echo "<div class='welcome-icon'>🏛️</div>";
  echo "<div class='welcome-name'>" . htmlspecialchars(ucfirst($_POST['username'])) . "</div>";
  echo "<div class='welcome-role'>Anggota House of Verses</div>";
  echo "</div>";
  echo "<form method='POST'><input type='hidden' name='action' value='logout'><button type='submit' class='btn-logout'>Keluar</button></form>";
} elseif ($status === 'gagal') {
  echo "<div class='alert alert-danger'><span class='alert-icon'>❌</span><div><b>Login Gagal</b><br>" . $pesan . "</div></div>";
} elseif ($status === 'kosong') {
  echo "<div class='alert alert-warning'><span class='alert-icon'>⚠️</span><div><b>Input Tidak Lengkap</b><br>" . $pesan . "</div></div>";
} elseif ($status === 'logout') {
  echo "<div class='alert alert-success'><span class='alert-icon'>👋</span><div>" . $pesan . "</div></div>";
}

// Form login (sembunyikan kalau login sukses)
if ($status !== 'sukses') :
?>
  <div class="form-title">Masuk ke Perpustakaan</div>
  <div class="form-sub">Masukkan ID dan password untuk mengakses koleksi</div>

  <form method="POST">
    <input type="hidden" name="action" value="login">
    <div class="fg">
      <label>Username / ID Anggota</label>
      <input type="text" name="username" placeholder="Masukkan username"
        value="<?php echo htmlspecialchars($input_id); ?>"
        class="<?php echo $input_id_error ? 'input-error' : ''; ?>">
    </div>
    <div class="fg">
      <label>Password</label>
      <div class="pw-wrap">
        <input type="password" name="password" id="pw" placeholder="Masukkan password"
          class="<?php echo $input_pw_error ? 'input-error' : ''; ?>">
        <button type="button" class="pw-eye" onclick="togglePw()">👁️</button>
      </div>
    </div>
    <button type="submit" class="btn-login">Masuk Sekarang</button>
  </form>

  <div class="hint-text">
    Akun demo: <b>admin / admin123</b> &nbsp;·&nbsp;
    <b>pustakawan / buku2024</b> &nbsp;·&nbsp;
    <b>user / password</b>
  </div>
<?php endif; ?>

</div>

<script>
function togglePw() {
  const i = document.getElementById('pw');
  const b = document.querySelector('.pw-eye');
  i.type = i.type === 'password' ? 'text' : 'password';
  b.textContent = i.type === 'password' ? '👁️' : '🙈';
}
</script>
</body>
</html>
