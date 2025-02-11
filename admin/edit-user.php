<?php
require_once '../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $username = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $updateQuery = "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?";
    $stmt = $koneksi->prepare($updateQuery);
    $stmt->bind_param("sssi", $username, $email, $role, $id);

    if ($stmt->execute()) {
        header("Location: atur-user.php?message=User updated successfully!");
        exit;
    } else {
        $error = "Failed to update user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f2f6;
            padding: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #4e73df;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $user['username']; ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $user['email']; ?>" required>

        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="guru" <?= $user['role'] == 'guru' ? 'selected' : ''; ?>>Guru</option>
            <option value="siswa" <?= $user['role'] == 'siswa' ? 'selected' : ''; ?>>Siswa</option>
        </select>

        <button type="submit">Update User</button>
    </form>
</body>
</html>
