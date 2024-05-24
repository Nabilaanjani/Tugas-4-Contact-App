<?php
session_start();

// Pastikan pengguna sudah login sebelum melakukan logout
if (isset($_SESSION['login'])) {
    // Hapus semua variabel sesi
    $_SESSION = [];
    // Hapus sesi
    session_unset();
    session_destroy();
}

// Setelah logout, arahkan kembali pengguna ke halaman login
header('location: login.php');
