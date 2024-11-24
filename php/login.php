<?php
session_start();

// Koneksi ke database
$host = 'localhost';
$db = 'berkah_grosir';
$user = 'berkahgrosir'; // Ganti dengan username database Anda
$pass = 'berkahgrosirmalang'; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Ambil data pengguna dari database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            // Set session dan redirect ke halaman utama
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.html"); // Ganti dengan halaman utama Anda
            exit;
        } else