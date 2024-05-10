<?php
require_once 'function.php'; // Anda bisa mempertimbangkan untuk menggabungkan koneksi ke database ke dalam model
require_once 'controllers/routes.php';

class MahasiswaModel {
    protected $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function getAllMahasiswa() {
        $query = "SELECT * FROM mahasiswa";
        return $this->query($query);
    }

    public function tambahMahasiswa($data) {
        $nim = htmlspecialchars($data['nim']);
        $nama = htmlspecialchars($data['nama']);
        $kelas = htmlspecialchars($data['kelas']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $semester = htmlspecialchars($data['semester']);

        $sql = "INSERT INTO mahasiswa(nim, nama, kelas, jurusan, semester) VALUES ('$nim','$nama','$kelas','$jurusan','$semester')";

        mysqli_query($this->koneksi, $sql);

        return mysqli_affected_rows($this->koneksi);
    }

    public function hapusMahasiswa($nim) {
        mysqli_query($this->koneksi, "DELETE FROM mahasiswa WHERE nim = $nim");
        return mysqli_affected_rows($this->koneksi);
    }

    public function ubahMahasiswa($data) {
        $nim = htmlspecialchars($data['nim']);
        $nama = htmlspecialchars($data['nama']);
        $kelas = htmlspecialchars($data['kelas']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $semester = htmlspecialchars($data['semester']);

        $sql = "UPDATE mahasiswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', semester = '$semester' WHERE nim = $nim";

        mysqli_query($this->koneksi, $sql);

        return mysqli_affected_rows($this->koneksi);
    }

    protected function query($query) {
        $result = mysqli_query($this->koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>
