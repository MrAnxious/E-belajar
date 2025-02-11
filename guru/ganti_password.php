<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
    header("Location: login.php");
    exit;
}

require 'config.php';

$guru_id = $_SESSION['user_id'];
$current_password = $_POST['current-password'];
$new_password = $_POST['new-password'];
$confirm_password = $_POST['confirm-password'];

// Validasi password baru
if ($new_password !== $confirm_password) {
    die("Password baru dan konfirmasi password tidak cocok.");
}

// Ambil password saat ini dari database
$query = "SELECT password FROM guru WHERE id = :id_guru";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_guru', $id_guru);
$stmt->execute();
$guru = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($current_password, $guru['password'])) {
    die("Password saat ini salah.");
}

// Hash password baru
$hashed_password = password($new_password, PASSWORD_DEFAULT);

// Update password di database
$query = "UPDATE guru SET password = :password WHERE id = :id_guru";
$stmt = $conn->prepare($query);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':guru_id', $guru_id);
$stmt->execute();

echo "Password berhasil diubah!";
header("Location: ../guru/profile.php");
?>