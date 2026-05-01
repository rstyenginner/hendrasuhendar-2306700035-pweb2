<?php
// Class Induk
class SivitasAkademik {
    protected $nama;

    // Constructor
    public function __construct($nama) {
        $this->nama = $nama;
    }

    // Getter
    public function getNama() {
        return $this->nama;
    }
}

// Class Anak 1: Dosen
class Dosen extends SivitasAkademik {
    private $nidn;

    public function __construct($nama, $nidn) {
        parent::__construct($nama);
        $this->nidn = $nidn;
    }

    public function getNidn() {
        return $this->nidn;
    }
}

// Class Anak 2: Mahasiswa
class Mahasiswa extends SivitasAkademik {
    private $nim;

    public function __construct($nama, $nim) {
        parent::__construct($nama);
        $this->nim = $nim;
    }

    public function getNim() {
        return $this->nim;
    }
}

// ==========================
// Instansiasi Object
// ==========================

$dosen = new Dosen("Pak Budi", "123456");
$mahasiswa = new Mahasiswa("Andi", "202312345");

// ==========================
// Output
// ==========================

echo "Data Dosen:<br>";
echo "Nama: " . $dosen->getNama() . "<br>";
echo "NIDN: " . $dosen->getNidn() . "<br><br>";

echo "Data Mahasiswa:<br>";
echo "Nama: " . $mahasiswa->getNama() . "<br>";
echo "NIM: " . $mahasiswa->getNim();
?>