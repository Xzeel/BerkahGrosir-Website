<?php
// Koneksi ke database
$host = 'localhost';
$db = 'berkah_grosir';
$user = 'berkahgrosir'; // Ganti dengan username database Anda
$pass = 'berkahgrosirmalang'; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mengambil data produk
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        echo "Nama: " . $product['name'] . "<br>";
        echo "Deskripsi: " . $product['description'] . "<br>";
        echo "Harga: " . $product['price'] . "<br>";
        echo "<img src='" . $product['image_url'] . "' alt='" . $product['name'] . "'><br><br>";
    }
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>