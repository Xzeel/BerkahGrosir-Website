<?php
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
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data pengguna ke database
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        // Redirect ke halaman login setelah pendaftaran berhasil
        header("Location: login.html");
        exit;