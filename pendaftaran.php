<?php
// Pendaftaran.php

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