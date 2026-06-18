<?php
// Hubungkan file logika backend (Tahap 5) ke file view ini
require_once 'Tiket.php';

// ==========================================
// TAHAP 6: SIMULASI DATA DARI DATABASE
// ==========================================
$daftarTiketDariDB = [
    new TiketRegular("T001", "The Matrix", "14:00 WIB", 2, 40000, "Dolby Atmos", "Baris E"),
    new TiketRegular("T002", "Inception", "16:30 WIB", 1, 40000, "Standard Audio", "Baris G"),
    new TiketIMAX("T003", "Interstellar", "19:00 WIB", 2, 60000, "3D-9921", true),
    new TiketIMAX("T004", "Avatar 3", "21:45 WIB", 3, 60000, null, false),
    new TiketVelvet("T005", "Gladiator II", "20:00 WIB", 2, 100000, true, true),
];

// Pengelompokkan data terpisah berdasarkan kategori Studio
$kategoriStudio = [
    "Studio Regular" => [],
    "Studio IMAX" => [],
    "Studio Velvet" => []
];

foreach ($daftarTiketDariDB as $tiket) {
    $kategoriStudio[$tiket->getJenisStudio()][] = $tiket;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Tiket Bioskop</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 40px; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        .studio-container { background: #fff; padding: 25px; margin-bottom: 35px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .studio-title { font-size: 20px; border-bottom: 3px solid #3498db; padding-bottom: 8px; color: #2c3e50; margin-top: 0; }
        .studio-title.imax { border-bottom-color: #e74c3c; }
        .studio-title.velvet { border-bottom-color: #9b59b6; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #e0e0e0; padding: 12px; text-align: left; font-size: 14px; }
        th { background-color: #f4f6f7; color: #34495e; font-weight: bold; }
        .text-right { text-align: right; }
        .text-bold { font-weight: bold; }
        .badge-info { font-size: 13px; color: #555; line-height: 1.5; }
    </style>
</head>
<body>

    <h1>Daftar Tiket Penonton Dinamis</h1>

    <?php foreach ($kategoriStudio as $namaStudio => $listTiket): ?>
        <?php 
            $cssClass = "";
            if($namaStudio == "Studio IMAX") $cssClass = "imax";
            if($namaStudio == "Studio Velvet") $cssClass = "velvet";
        ?>
        <div class="studio-container">
            <h2 class="studio-title <?= $cssClass ?>"><?= $namaStudio ?></h2>
            
            <?php if (empty($listTiket)): ?>
                <p style="color: #7f8c8d; font-style: italic;">Belum ada riwayat pesanan untuk studio ini.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID Tiket</th>
                            <th>Nama Film</th>
                            <th>Jadwal Tayang</th>
                            <th>Jumlah Kursi</th>
                            <th>Harga Dasar</th>
                            <th>Spesifikasi & Fasilitas Unik (Polimorfik)</th>
                            <th class="text-right">Total Harga (Polimorfik)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listTiket as $tiket): ?>
                            <tr>
                                <td><code><?= $tiket->getIdTiket() ?></code></td>
                                <td class="text-bold"><?= htmlspecialchars($tiket->getNamaFilm()) ?></td>
                                <td><?= $tiket->getJadwalTayang() ?></td>
                                <td><?= $tiket->getJumlahKursi() ?> Kursi</td>
                                <td>Rp <?= number_format($tiket->getHargaDasarTiket(), 0, ',', '.') ?></td>
                                
                                <td class="badge-info"><?= $tiket->tampilkanInfoFasilitas() ?></td>
                                
                                <td class="text-right text-bold" style="color: #27ae60;">
                                    Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</body>
</html>