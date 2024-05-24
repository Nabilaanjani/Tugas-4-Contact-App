<?php

require 'env.php';
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Pengecekan kelengkapan data
    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields.';
        header('Location: register.php?error=' . urlencode($error));
        exit;
    }

    // Registrasi pengguna baru
    if (register($username, $password) > 0) {
        header('Location: login.php');
        exit;
    } else {
        $error = 'Registration failed. Username might already be taken.';
        header('Location: register.php?error=' . urlencode($error));
        exit;
    }
} else {
    header('Location: register.php');
    exit;
}
?>
