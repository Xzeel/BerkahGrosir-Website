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
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        // Ambil data pengguna dari database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            // Set session dan redirect ke halaman utama
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php"); // Ganti dengan halaman utama Anda
            exit;
        } else {
            // Tampilkan pesan kesalahan jika autentikasi gagal
            $error = "Username atau password salah";
        }
    }
} catch (PDOException $e) {
    // Tampilkan pesan kesalahan jika koneksi database gagal
    $error = "Gagal terhubung ke database: " . $e->getMessage();
}

// Tampilkan form login jika autentikasi gagal
if (!isset($_SESSION['user_id'])) {
    ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
}