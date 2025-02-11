<?php
require_once '../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: atur-users.php?message=User deleted successfully!");
        exit;
    } else {
        echo "Failed to delete user.";
    }
}
?>
