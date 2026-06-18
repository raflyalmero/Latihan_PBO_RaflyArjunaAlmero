<?php
// ==========================================
// TAHAP 3 & 5: IMPLEMENTASI ABSTRAKSI & POLIMORFISME OVERRIDING
// ==========================================
abstract class Tiket {
    // Properti Terenkapsulasi (Protected)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;
    protected $jenisStudio; 

    // Constructor untuk memetakan nilai
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // Metode Abstrak yang wajib di-override
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    // Getter untuk akses aman dari luar
    public function getIdTiket() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwalTayang() { return $this->jadwal_tayang; }
    public function getJumlahKursi() { return $this->jumlah_kursi; }
    public function getHargaDasarTiket() { return $this->hargaDasarTiket; }
    public function getJenisStudio() { return $this->jenisStudio; }
}

// 1. SUBCLASS: TiketRegular
class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;
    protected $jenisStudio = "Studio Regular";

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Overriding Rumus Baru: jumlah_kursi * hargaDasarTiket
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        return "Tarif standar murni tanpa biaya tambahan fasilitas.<br>" . 
               "• Tipe Audio: " . $this->tipeAudio . "<br>" . 
               "• Lokasi Baris: " . $this->lokasiBaris;
    }
}

// 2. SUBCLASS: TiketIMAX
class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;
    protected $jenisStudio = "Studio IMAX";

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Overriding Rumus Baru: (jumlah_kursi * hargaDasarTiket) + 35000
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        return "Dikenakan biaya tambahan teknologi proyeksi layar lebar IMAX dan audio flat Rp35.000.<br>" . 
               "• ID Kacamata 3D: " . ($this->kacamata3dId ?? "Tidak Ada") . "<br>" . 
               "• Fitur Efek Gerak: " . ($this->efekGerakFitur ? "Tersedia" : "Tidak Tersedia");
    }
}

// 3. SUBCLASS: TiketVelvet
class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;
    protected $jenisStudio = "Studio Velvet";

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Overriding Rumus Baru: (jumlah_kursi * hargaDasarTiket) * 1.50
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        return "Dikenakan surcharge/biaya tambahan kelas premium sebesar 50% dari total harga dasar.<br>" . 
               "• Paket Bantal & Selimut: " . ($this->bantalSelimutPack ? "Termasuk" : "Tidak") . "<br>" . 
               "• Layanan Butler: " . ($this->layananButler ? "Aktif" : "Tidak Aktif");
    }
}
?>