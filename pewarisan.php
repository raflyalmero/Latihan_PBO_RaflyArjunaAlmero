<?php

// ==========================================
// TAHAP 3: IMPLEMENTASI ABSTRAKSI (ABSTRACT CLASS)
// ==========================================
abstract class Tiket {
    // Properti Terenkapsulasi (Protected)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    // Constructor untuk memetakan nilai dari kolom database
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // Metode Abstrak (Wajib diimplementasikan oleh subclass konkrit)
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    // Getter untuk akses data secara aman dari luar class
    public function getIdTiket() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwalTayang() { return $this->jadwal_tayang; }
    public function getJumlahKursi() { return $this->jumlah_kursi; }
    public function getHargaDasarTiket() { return $this->hargaDasarTiket; }
}


// ==========================================
// TAHAP 4: IMPLEMENTASI PEWARISAN (INHERITANCE)
// ==========================================

// 1. SUBCLASS: TiketRegular
class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari kelas induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    public function hitungTotalHarga() {
        // Studio Regular tidak memiliki biaya tambahan khusus studio
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        echo "Fasilitas Studio Regular:\n";
        echo "- Tipe Audio: " . $this->tipeAudio . "\n";
        echo "- Lokasi Baris Kursi: " . $this->lokasiBaris . "\n";
    }
}

// 2. SUBCLASS: TiketIMAX
class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur; // Boolean

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga() {
        // Studio IMAX dikenakan biaya tambahan Rp 25.000 per kursi
        $biayaTambahanIMAX = 25000;
        return ($this->hargaDasarTiket + $biayaTambahanIMAX) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        echo "Fasilitas Studio IMAX:\n";
        echo "- Audio Sistem: IMAX 12-Channel\n";
        echo "- ID Kacamata 3D: " . ($this->kacamata3dId ?? "Tidak Menggunakan Kacamata (2D)") . "\n";
        echo "- Fitur Efek Gerak: " . ($this->efekGerakFitur ? "Tersedia (Kursi Bergetar)" : "Tidak Tersedia") . "\n";
    }
}

// 3. SUBCLASS: TiketVelvet
class TiketVelvet extends Tiket {
    private $bantalSelimutPack; // Boolean
    private $layananButler;      // Boolean

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga() {
        // Kelas Velvet adalah kelas premium dengan tambahan biaya layanan Rp 100.000 per kursi
        $biayaPremium = 100000;
        return ($this->hargaDasarTiket + $biayaPremium) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        echo "Fasilitas Premium Studio Velvet:\n";
        echo "- Jenis Kursi: Premium Sofa Bed Class\n";
        echo "- Paket Bantal & Selimut: " . ($this->bantalSelimutPack ? "Termasuk" : "Tidak Tersedia") . "\n";
        echo "- Layanan Butler (Tombol Panggil): " . ($this->layananButler ? "Aktif" : "Tidak Aktif") . "\n";
    }
}