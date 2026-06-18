<?php
// Pendaftaran.php

// =========================================================================
// 1. KONEKSI DATABASE (PDO) - Diperlukan agar tidak terjadi Fatal Error di index.php
// =========================================================================
class Database {
    private $host = "localhost";
    private $username = "root"; 
    private $password = "";     
    private $db_name = "DB_SIMULASI_PBO_TI-1D_DokterQolbiyAlHasaniy";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

// =========================================================================
// 2. ABSTRACT CLASS INDUK
// =========================================================================
abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected) - sesuai kolom tabel database Tahap 1
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk memetakan data dari database ke properti objek
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // Getter untuk properti yang dienkapsulasi (jika nanti dibutuhkan oleh kelas luar)
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    // ================= METODE ABSTRAK =================
    // Wajib diimplementasikan (di-override) oleh kelas anak (Reguler, Prestasi, Kedinasan)
    
    // 1. Metode untuk menghitung total biaya pendaftaran berdasarkan aturan jalur masing-masing
    abstract public function hitungTotalBiaya();

    // 2. Metode untuk menampilkan informasi spesifik mengenai jalur pendaftaran
    abstract public function tampilkanInfoJalur();
}
?>