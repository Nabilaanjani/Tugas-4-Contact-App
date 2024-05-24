// Pemanggilan setiap halaman berdasarkan rutenya
Router::url('index', 'get', function() {
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['login'])) {
        header('Location: login');
        exit;
    } else {
        require 'index.php';
    }
});

Router::url('register', 'get', 'register.php');
Router::url('process_register', 'post', 'process_register.php');

Router::url('login', 'get', 'login.php');

Router::url('addData', 'post', function() {
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['login'])) {
        header('Location: login');
        exit;
    } else {
        require 'addData.php';
    }
});

Router::url('detail', 'get', function() {
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['login'])) {
        header('Location: login');
        exit;
    } else {
        require 'views/detail.php';
    }
});

Router::url('export', 'get', function() {
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['login'])) {
        header('Location: login');
        exit;
    } else {
        require 'export.php';
    }
});

Router::url('hapus', 'get', function() {
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['login'])) {
        header('Location: login');
        exit;
    } else {
        require 'hapus.php';
    }
});

Router::url('ubah', 'get', function() {
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['login'])) {
        header('Location: login');
        exit;
    } else {
        require 'views/ubah.php';
    }
});

// Redirect jika tidak ada rute yang cocok
Router::url('/', 'get', function () {
    header('Location: login');
});
