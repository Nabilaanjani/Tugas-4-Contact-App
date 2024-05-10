<?php
// routes.php
require 'env.php';
require 'function.php';
require_once 'models/MahasiswaModel.php';

// Pemanggilan setiap halaman berdasarkan rutenya
Router::url('index', 'get', 'index.php');
Router::url('register', 'get', 'register.php');
Router::url('process_register', 'post', 'process_register.php');
Router::url('login', 'get', 'login.php');
Router::url('addData', 'post', 'addData.php');
Router::url('detail', 'get', 'views/detail.php');
Router::url('export', 'get', 'export.php');
Router::url('hapus', 'get', 'hapus.php');
Router::url('ubah', 'get', 'views/ubah.php');

// Redirect jika tidak ada rute yang cocok
Router::url('/', 'get', function () {
    header('Location: login');
});
