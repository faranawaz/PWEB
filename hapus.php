<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil nomor ID sebelum menghapus
$result = $koneksi->query("SELECT id FROM barang WHERE id = $id");
$deletedId = $result->fetch_assoc()['id'];

// Hapus data
$query = "DELETE FROM barang WHERE id = $id";
$koneksi->query($query);

// Update urutan ID setelah menghapus
$koneksi->query("SET @count = 0");
$koneksi->query("UPDATE barang SET id = @count:= @count + 1");
$koneksi->query("ALTER TABLE barang AUTO_INCREMENT = 1");

header('Location: index.php');
exit;
?>