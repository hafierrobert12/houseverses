<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>House of Verses – Kelola Buku</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&family=Playfair+Display:ital,wght@0,500;0,700;1,500&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #0e0907; --gold: #d4a843; --parchment: #c8a96e;
    --off-white: #f5ead8; --muted: #8a7a60; --accent: #4a7cff;
    --accent2: #7b5ea7; --card-bg: rgba(255,255,255,0.97);
  }
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body { background: var(--bg); font-family: 'Nunito', sans-serif; color: var(--off-white); min-height: 100vh; padding: 30px 20px 60px; }

  .nav-bar {
    display: flex; justify-content: center; gap: 12px;
    margin-bottom: 32px; flex-wrap: wrap;
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

  .page-title {
    text-align: center; margin-bottom: 32px;
  }
  .page-title h1 {
    font-family: 'Playfair Display', serif; font-size: 2rem;
    color: var(--gold); margin-bottom: 6px;
  }
  .page-title p { color: var(--muted); font-size: 0.85rem; }

  .main-layout {
    display: grid; grid-template-columns: 380px 1fr;
    gap: 28px; max-width: 1100px; margin: 0 auto;
    align-items: start;
  }
  @media(max-width: 800px) { .main-layout { grid-template-columns: 1fr; } }

  /* Form panel */
  .form-panel {
    background: var(--card-bg); border-radius: 20px; padding: 32px 30px;
    box-shadow: 0 20px 60px rgba(0,0,0,.5);
  }
  .panel-title {
    font-size: 1.1rem; font-weight: 800; color: #0d1120;
    margin-bottom: 20px; display: flex; align-items: center; gap: 8px;
  }
  .fg { margin-bottom: 13px; }
  label {
    display: block; font-size: 0.7rem; font-weight: 700; color: #5a6580;
    margin-bottom: 4px; letter-spacing: .06em; text-transform: uppercase;
  }
  input[type=text], input[type=number], select, textarea {
    width: 100%; padding: 10px 13px; border: 1.5px solid #e4e8f2;
    border-radius: 9px; font-family: 'Nunito', sans-serif; font-size: 0.85rem;
    color: #0d1120; background: #f8faff; outline: none;
    transition: border-color .2s, box-shadow .2s;
  }
  input:focus, select:focus, textarea:focus {
    border-color: var(--accent); background: #fff;
    box-shadow: 0 0 0 3px rgba(74,124,255,.12);
  }
  textarea { resize: vertical; min-height: 70px; }

  .btn-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 6px; }
  .btn {
    padding: 10px 16px; border: none; border-radius: 10px; cursor: pointer;
    font-family: 'Nunito', sans-serif; font-size: 0.85rem; font-weight: 700;
    transition: opacity .2s, transform .15s;
  }
  .btn:hover { opacity: .88; transform: translateY(-1px); }
  .btn-primary { background: linear-gradient(135deg, var(--accent), var(--accent2)); color: #fff; grid-column: 1/-1; }
  .btn-reset { background: #f4f6fb; color: #5a6580; border: 1.5px solid #e4e8f2; }
  .btn-edit { background: #fff8e1; color: #856404; border: 1.5px solid #f7d774; font-size: 0.78rem; padding: 6px 12px; }
  .btn-delete { background: #fff3f3; color: #c0392b; border: 1.5px solid #ffb3b3; font-size: 0.78rem; padding: 6px 12px; }

  /* Alert */
  .alert {
    border-radius: 10px; padding: 11px 14px; margin-bottom: 18px;
    font-size: 0.82rem; font-weight: 600; display: flex; align-items: center; gap: 8px;
  }
  .alert-success { background: #edfbf0; border: 1.5px solid #6fcf97; color: #1a7a3c; }
  .alert-danger  { background: #fff3f3; border: 1.5px solid #ffb3b3; color: #c0392b; }
  .alert-info    { background: #f0f4ff; border: 1.5px solid #b3c6ff; color: #2346c0; }

  /* Table */
  .table-panel {
    background: rgba(255,255,255,0.04); border: 1px solid rgba(212,168,67,.12);
    border-radius: 20px; overflow: hidden;
  }
  .table-header {
    padding: 20px 24px 16px; display: flex; align-items: center;
    justify-content: space-between; border-bottom: 1px solid rgba(212,168,67,.1);
  }
  .table-header h3 {
    font-family: 'Playfair Display', serif; font-size: 1.1rem; color: var(--gold);
  }
  .table-count { font-size: 0.78rem; color: var(--muted); }

  table { width: 100%; border-collapse: collapse; }
  th {
    background: rgba(212,168,67,.08); padding: 12px 16px; text-align: left;
    font-size: 0.7rem; font-weight: 700; color: var(--parchment);
    letter-spacing: .07em; text-transform: uppercase;
    border-bottom: 1px solid rgba(212,168,67,.1);
  }
  td {
    padding: 13px 16px; font-size: 0.83rem; color: var(--off-white);
    border-bottom: 1px solid rgba(255,255,255,.04); vertical-align: top;
  }
  tr:last-child td { border-bottom: none; }
  tr:hover td { background: rgba(255,255,255,.03); }

  .td-id { color: var(--accent); font-weight: 700; font-size: 0.75rem; }
  .td-judul { font-weight: 600; color: #f5ead8; }
  .td-pengarang { color: var(--parchment); }
  .td-tahun { color: var(--muted); font-size: 0.78rem; }
  .td-stok { }
  .stok-badge {
    display: inline-block; padding: 2px 10px; border-radius: 20px;
    font-size: 0.72rem; font-weight: 700;
  }
  .stok-ok   { background: rgba(111,207,151,.15); color: #6fcf97; }
  .stok-low  { background: rgba(247,215,116,.15); color: #f7d774; }
  .stok-empty{ background: rgba(255,100,100,.15);  color: #ff7070; }
  .td-actions { display: flex; gap: 6px; flex-wrap: wrap; }

  .empty-state { text-align: center; padding: 40px 20px; color: var(--muted); }
  .empty-state .empty-icon { font-size: 2.5rem; margin-bottom: 10px; }

  .db-error {
    background: rgba(255,100,100,.1); border: 1px solid rgba(255,100,100,.3);
    border-radius: 12px; padding: 20px 24px; max-width: 1100px; margin: 0 auto 24px;
    color: #ff9090; font-size: 0.85rem;
  }
  .db-error code {
    display: block; margin-top: 8px; padding: 8px 12px;
    background: rgba(0,0,0,.3); border-radius: 6px; font-size: 0.78rem;
    color: #ffb3b3; white-space: pre-wrap;
  }
</style>
</head>
<body>

<nav class="nav-bar">
  <a href="index.php">Katalog</a>
  <a href="kalkulator.php">Pencarian</a>
  <a href="login.php">Login</a>
  <a href="crud.php" class="active">Kelola Buku</a>
</nav>

<div class="page-title">
  <h1>📖 Kelola Koleksi Buku</h1>
  <p>Tambah, ubah, dan hapus data buku di House of Verses</p>
</div>

<?php
// ══ KONFIGURASI DATABASE ══
// Ganti sesuai setup MySQL kamu
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'house_of_verses');

$db_error = null;
$conn = null;

// Coba koneksi
try {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
  if ($conn->connect_error) throw new Exception($conn->connect_error);

  // Buat database jika belum ada
  $conn->query("CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
  $conn->select_db(DB_NAME);

  // Buat tabel jika belum ada (minimal 4 kolom sesuai tugas)
  $conn->query("CREATE TABLE IF NOT EXISTS buku (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    judul       VARCHAR(255) NOT NULL,
    pengarang   VARCHAR(150) NOT NULL,
    tahun_terbit YEAR NOT NULL,
    stok        INT DEFAULT 1,
    keterangan  TEXT
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

} catch (Exception $e) {
  $db_error = $e->getMessage();
}

$alert = '';
$alert_type = '';
$edit_data = null;

if ($conn && !$db_error) {
  $action = $_POST['action'] ?? $_GET['action'] ?? '';
  $id     = intval($_POST['id'] ?? $_GET['id'] ?? 0);

  // ── CREATE / UPDATE ──
  if ($action === 'simpan') {
    $judul   = trim($_POST['judul'] ?? '');
    $pengarang = trim($_POST['pengarang'] ?? '');
    $tahun   = intval($_POST['tahun_terbit'] ?? 0);
    $stok    = intval($_POST['stok'] ?? 0);
    $ket     = trim($_POST['keterangan'] ?? '');

    if (!$judul || !$pengarang || !$tahun) {
      $alert = 'Judul, pengarang, dan tahun wajib diisi!';
      $alert_type = 'danger';
    } else {
      if ($id > 0) {
        $stmt = $conn->prepare("UPDATE buku SET judul=?, pengarang=?, tahun_terbit=?, stok=?, keterangan=? WHERE id=?");
        $stmt->bind_param('ssiisi', $judul, $pengarang, $tahun, $stok, $ket, $id);
        $stmt->execute();
        $alert = '✏️ Data buku berhasil diperbarui.';
        $alert_type = 'success';
      } else {
        $stmt = $conn->prepare("INSERT INTO buku (judul, pengarang, tahun_terbit, stok, keterangan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssiis', $judul, $pengarang, $tahun, $stok, $ket);
        $stmt->execute();
        $alert = '✅ Buku baru berhasil ditambahkan!';
        $alert_type = 'success';
      }
      $id = 0; // reset form setelah simpan
    }
  }

  // ── DELETE ──
  if ($action === 'hapus' && $id > 0) {
    $stmt = $conn->prepare("DELETE FROM buku WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $alert = '🗑️ Buku berhasil dihapus dari koleksi.';
    $alert_type = 'danger';
    $id = 0;
  }

  // ── GET FOR EDIT ──
  if ($action === 'edit' && $id > 0) {
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $edit_data = $stmt->get_result()->fetch_assoc();
    if ($edit_data) {
      $alert = 'ℹ️ Mode edit aktif untuk: ' . htmlspecialchars($edit_data['judul']);
      $alert_type = 'info';
    }
  }

  // ── READ ALL ──
  $result = $conn->query("SELECT * FROM buku ORDER BY id DESC");
  $semua_buku = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
  $total = count($semua_buku);
}
?>

<?php if ($db_error): ?>
<div class="db-error">
  <strong>⚠️ Tidak dapat terhubung ke database.</strong>
  Pastikan MySQL sudah berjalan dan konfigurasi di atas sudah benar.
  <code><?php echo htmlspecialchars($db_error); ?></code>
  <br><br>
  Edit baris <code>DB_HOST</code>, <code>DB_USER</code>, <code>DB_PASS</code>, <code>DB_NAME</code> di bagian atas file <code>crud.php</code>.
</div>
<?php endif; ?>

<div class="main-layout">

  <!-- ═══ FORM TAMBAH / EDIT ═══ -->
  <div class="form-panel">
    <div class="panel-title">
      <?php echo ($edit_data ? '✏️ Edit Data Buku' : '➕ Tambah Buku Baru'); ?>
    </div>

    <?php if ($alert): ?>
    <div class="alert alert-<?php echo $alert_type; ?>">
      <?php echo htmlspecialchars($alert); ?>
    </div>
    <?php endif; ?>

    <form method="POST">
      <input type="hidden" name="action" value="simpan">
      <input type="hidden" name="id" value="<?php echo $edit_data ? $edit_data['id'] : 0; ?>">

      <div class="fg">
        <label>Judul Buku *</label>
        <input type="text" name="judul" placeholder="Contoh: Laskar Pelangi"
          value="<?php echo htmlspecialchars($edit_data['judul'] ?? ''); ?>" required>
      </div>
      <div class="fg">
        <label>Pengarang *</label>
        <input type="text" name="pengarang" placeholder="Contoh: Andrea Hirata"
          value="<?php echo htmlspecialchars($edit_data['pengarang'] ?? ''); ?>" required>
      </div>
      <div class="fg">
        <label>Tahun Terbit *</label>
        <input type="number" name="tahun_terbit" placeholder="Contoh: 2005"
          min="1800" max="<?php echo date('Y'); ?>"
          value="<?php echo htmlspecialchars($edit_data['tahun_terbit'] ?? ''); ?>" required>
      </div>
      <div class="fg">
        <label>Stok</label>
        <input type="number" name="stok" placeholder="Jumlah stok" min="0"
          value="<?php echo htmlspecialchars($edit_data['stok'] ?? '1'); ?>">
      </div>
      <div class="fg">
        <label>Keterangan (opsional)</label>
        <textarea name="keterangan" placeholder="Sinopsis singkat atau catatan..."><?php echo htmlspecialchars($edit_data['keterangan'] ?? ''); ?></textarea>
      </div>

      <div class="btn-row">
        <button type="submit" class="btn btn-primary">
          <?php echo $edit_data ? '💾 Simpan Perubahan' : '➕ Tambah Buku'; ?>
        </button>
        <a href="crud.php" class="btn btn-reset" style="text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;">🔄 Reset</a>
      </div>
    </form>
  </div>

  <!-- ═══ TABEL DATA ═══ -->
  <div class="table-panel">
    <div class="table-header">
      <h3>Koleksi Buku</h3>
      <span class="table-count"><?php echo $db_error ? '—' : $total . ' buku'; ?></span>
    </div>

    <?php if ($db_error): ?>
      <div class="empty-state">
        <div class="empty-icon">🔌</div>
        <div>Database belum terhubung</div>
      </div>
    <?php elseif (empty($semua_buku)): ?>
      <div class="empty-state">
        <div class="empty-icon">📭</div>
        <div>Belum ada buku. Tambahkan koleksi pertamamu!</div>
      </div>
    <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Tahun</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($semua_buku as $buku): ?>
        <tr>
          <td class="td-id">#<?php echo $buku['id']; ?></td>
          <td class="td-judul"><?php echo htmlspecialchars($buku['judul']); ?></td>
          <td class="td-pengarang"><?php echo htmlspecialchars($buku['pengarang']); ?></td>
          <td class="td-tahun"><?php echo $buku['tahun_terbit']; ?></td>
          <td>
            <?php
              $s = intval($buku['stok']);
              $cls = $s > 3 ? 'stok-ok' : ($s > 0 ? 'stok-low' : 'stok-empty');
              echo "<span class='stok-badge $cls'>$s</span>";
            ?>
          </td>
          <td>
            <div class="td-actions">
              <a href="crud.php?action=edit&id=<?php echo $buku['id']; ?>" class="btn btn-edit">✏️ Edit</a>
              <form method="POST" style="display:inline" onsubmit="return confirm('Hapus buku ini?')">
                <input type="hidden" name="action" value="hapus">
                <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
                <button type="submit" class="btn btn-delete">🗑️ Hapus</button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>

</div>

</body>
</html>
