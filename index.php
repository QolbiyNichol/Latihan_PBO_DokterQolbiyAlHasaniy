<?php
// index.php

// Load semua file class yang dibutuhkan
require_once 'pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 1. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Gagal terhubung ke antarmuka aplikasi.");
}

// 2. Ambil Data Menggunakan Metode Query Spesifik (Tahap 4)
$dataReguler   = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi PBO - Panel Pendaftaran</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        h2 { color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 8px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 5px; overflow: hidden; }
        th, td { padding: 12px 15px; text-align: left; }
        th { background-color: #2c3e50; color: white; text-transform: uppercase; font-size: 13px; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f2f6; }
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold; background-color: #e17055; color: white; }
        .price { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>Panel Kendali Simulasi PBO - Pendaftaran Mahasiswa Baru</h1>

    <h2>Daftar Mahasiswa - Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Informasi Spesifik Jalur (Polimorfik)</th>
                <th>Total Biaya Akhir (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataReguler as $row): 
                // Instansiasi objek secara dinamis untuk memanfaatkan polimorfisme
                $objek = new PendaftaranReguler(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                    $row['pilihan_prodi'], $row['lokasi_kampus']
                );
            ?>
            <tr>
                <td><?= $objek->getIdPendaftaran(); ?></td>
                <td><strong><?= htmlspecialchars($objek->getNamaCalon()); ?></strong></td>
                <td><?= htmlspecialchars($objek->getAsalSekolah()); ?></td>
                <td><?= $objek->getNilaiUjian(); ?></td>
                <td>Rp<?= number_format($objek->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                <td><span class="badge" style="background-color: #2980b9;"><?= $objek->tampilkanInfoJalur(); ?></span></td>
                <td class="price">Rp<?= number_format($objek->hitungTotalBiaya(), 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Daftar Mahasiswa - Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Informasi Spesifik Jalur (Polimorfik)</th>
                <th>Total Biaya Akhir (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataPrestasi as $row): 
                $objek = new PendaftaranPrestasi(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                    $row['jenis_prestasi'], $row['tingkat_prestasi']
                );
            ?>
            <tr>
                <td><?= $objek->getIdPendaftaran(); ?></td>
                <td><strong><?= htmlspecialchars($objek->getNamaCalon()); ?></strong></td>
                <td><?= htmlspecialchars($objek->getAsalSekolah()); ?></td>
                <td><?= $objek->getNilaiUjian(); ?></td>
                <td>Rp<?= number_format($objek->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                <td><span class="badge" style="background-color: #e67e22;"><?= $objek->tampilkanInfoJalur(); ?></span></td>
                <td class="price">Rp<?= number_format($objek->hitungTotalBiaya(), 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Daftar Mahasiswa - Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Informasi Spesifik Jalur (Polimorfik)</th>
                <th>Total Biaya Akhir (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataKedinasan as $row): 
                $objek = new PendaftaranKedinasan(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                    $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                );
            ?>
            <tr>
                <td><?= $objek->getIdPendaftaran(); ?></td>
                <td><strong><?= htmlspecialchars($objek->getNamaCalon()); ?></strong></td>
                <td><?= htmlspecialchars($objek->getAsalSekolah()); ?></td>
                <td><?= $objek->getNilaiUjian(); ?></td>
                <td>Rp<?= number_format($objek->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                <td><span class="badge" style="background-color: #27ae60;"><?= $objek->tampilkanInfoJalur(); ?></span></td>
                <td class="price">Rp<?= number_format($objek->hitungTotalBiaya(), 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>