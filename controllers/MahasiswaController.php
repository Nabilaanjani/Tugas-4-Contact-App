<?php
require_once 'models/MahasiswaModel.php';

class MahasiswaController {
    protected $mahasiswaModel;

    public function __construct() {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index() {
        $siswa = $this->mahasiswaModel->getAllMahasiswa();
        require_once 'controllers/index.php'; // Memuat tampilan index.php dengan data mahasiswa
    }

    public function tambah() {
        session_start();
        // Jika tidak bisa login maka balik ke login.php
        if (!isset($_SESSION['login'])) {
            header('location:login.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->mahasiswaModel->tambahMahasiswa($_POST)) {
                echo "<script>
                        alert('Data Mahasiswa berhasil ditambahkan!');
                        document.location.href = 'controllers/index.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Data Mahasiswa gagal ditambahkan!');
                    </script>";
            }
        } else {
            require_once 'adddata.php';
        }

        public function detail() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dataSiswa'])) {
                // Ambil data mahasiswa berdasarkan nim
                $nim = $_POST['dataSiswa'];
                $mahasiswa = $this->mahasiswaModel->getMahasiswaByNIM($nim);
                // Load view views/detail.php dengan data mahasiswa
                include 'views/detail.php';
            }
    }

    public function ubah() {
        // Cek apakah sudah login
        if (!isset($_SESSION['login'])) {
            header('location:login.php');
            exit;
        }

        // Memastikan nim terdefinisi
        if (!isset($_GET['nim'])) {
            // Redirect jika nim tidak tersedia
            header('location:index.php');
            exit;
        }

        $nim = $_GET['nim'];
        $siswa = $this->mahasiswaModel->getMahasiswaByNim($nim);

        if (!$siswa) {
            // Redirect jika mahasiswa tidak ditemukan
            header('location:index.php');
            exit;
        }

        // Proses form ubah mahasiswa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nim' => $nim,
                'nama' => $_POST['nama'],
                'kelas' => $_POST['kelas'],
                'jurusan' => $_POST['jurusan'],
                'semester' => $_POST['semester']
            ];

            if ($this->mahasiswaModel->ubahMahasiswa($data)) {
                // Redirect setelah berhasil mengubah data
                header('location:index.php');
                exit;
            } else {
                // Tampilkan pesan kesalahan jika gagal mengubah data
                $error = "Gagal mengubah data mahasiswa";
            }
        }

        // Load view views/ubah.php dengan data mahasiswa yang akan diubah
        require_once 'views/ubah.php';
    }

    // Metode lainnya seperti edit, hapus, dll.
}
?>
