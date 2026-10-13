<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalBuku = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
$totalAnggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();

// Menghitung jumlah buku yang statusnya sedang dipinjam (Jobsheet 12)
$stmtPinjam = $pdo->query("SELECT COUNT(*) FROM peminjaman WHERE status = 'dipinjam'");
$sedangDipinjam = $stmtPinjam->fetchColumn();
?>
        <section>
            <h2>Selamat Datang di Sistem Perpustakaan Mini</h2>
            <p>Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.</p>
        </section>

        <section>
            <h2>Ringkasan</h2>
            <div class="cards-container">
                <article>
                    <h3>Total Buku</h3>
                    <p><?php echo htmlspecialchars($totalBuku); ?></p>
                </article>
                <article>
                    <h3>Total Anggota</h3>
                    <p><?php echo htmlspecialchars($totalAnggota); ?></p>
                </article>
                <article>
                    <h3>Sedang Dipinjam</h3>
                    <p><?php echo htmlspecialchars($sedangDipinjam); ?></p>
                </article>
            </div>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>