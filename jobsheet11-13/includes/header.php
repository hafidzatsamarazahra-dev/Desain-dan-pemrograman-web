<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Menghitung path relatif otomatis untuk folder yang bersarang
$__jobsheetRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);
$__rel = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($__jobsheetRoot))), '/');
$base = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . " - SIMPUS-Mini" : "SIMPUS-Mini"; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body>
    <header>
        <h1>SIMPUS-Mini</h1>
        <button class="nav-toggle-label" aria-label="Toggle Navigation">&#9776;</button>
        <nav>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Beranda</a></li>
                <li><a href="<?php echo $base; ?>buku/list.php">Daftar Buku</a></li>
                <li><a href="<?php echo $base; ?>buku/tambah.php">Tambah Buku</a></li>
                <li><a href="<?php echo $base; ?>anggota/list.php">Daftar Anggota</a></li>
                <li><a href="<?php echo $base; ?>anggota/tambah.php">Tambah Anggota</a></li>
                <?php if (!empty($_SESSION['user_id'])): ?>
                    <li><a href="<?php echo $base; ?>peminjaman/tambah.php">Peminjaman Baru</a></li>
                    <li><a href="<?php echo $base; ?>peminjaman/kembali.php">Pengembalian</a></li>
                    <li><a href="<?php echo $base; ?>peminjaman/riwayat.php">Riwayat</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="auth-status">
            <?php if (!empty($_SESSION['user_id'])): ?>
                <span>Halo, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Petugas'); ?></span>
                <a href="<?php echo $base; ?>auth/logout.php">Logout</a>
            <?php else: ?>
                <a href="<?php echo $base; ?>auth/login.php">Login</a>
            <?php endif; ?>
        </div>
    </header>
    <main>