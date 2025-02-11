<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}


// Koneksi ke database
require_once '../koneksi.php';

// Query untuk mengambil data pengguna
$query = "SELECT id, username, email, role FROM users";
$result = $koneksi->query($query);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage User</title>
    <link rel="icon" type="image/png" href="https://smpn1mayong.sch.id/images/download-removebg-preview1.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            height: 100vh;
            background: #f1f2f6;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #4e73df;
            color: #fff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .sidebar h2 {
            font-size: 22px;
            margin: 0;
            padding-bottom: 20px;
            border-bottom: 2px solid #fff;
        }

        .sidebar img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #3759c1;
        }

        /* Content styling */
        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .header {
            background-color: #4e73df;
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            margin: 0;
        }

        /* Manage Users Section */
        .manage-users {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

       /* General Table Styling */
.user-table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.user-table th, 
.user-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.user-table th {
    background-color: #4e73df;
    color: #fff;
    text-transform: uppercase;
    font-weight: 500;
}

.user-table tr:hover {
    background-color: #f1f2f6;
}

/* Action Buttons Container */
.action-btns {
    display: flex;
    gap: 10px;
}

/* Edit Button Styling */
.edit-btn {
    background-color: #4e73df;
    color: #fff;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
    text-align: center;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.edit-btn:hover {
    background-color: #3759c1;
}

/* Delete Button Styling */
.delete-btn {
    background-color: #e74a3b;
    color: #fff;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
    text-align: center;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.delete-btn:hover {
    background-color: #c0392b;
}

/* Add Button Styling */
.add-user-btn {
    padding: 12px 18px;
    font-size: 16px;
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    border: none;
    margin-bottom: 15px;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.add-user-btn:hover {
    background-color: #218838;
}

/* Responsive Design */
@media (max-width: 768px) {
    .user-table th,
    .user-table td {
        font-size: 14px;
        padding: 8px;
    }

    .add-user-btn {
        width: 100%;
        text-align: center;
    }
}

    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Dashboard Admin</h2>
        <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/non_2x/vector-users-icon.jpg" alt="Admin Profile">
        <h2><?= $_SESSION['username']; ?></h2>
        <a href="..\dashboard\admin.php">Dashboard</a>
        <a href="admin\atur-user.php">Manage Users</a>
        <a href="admin\laporan.php">Lihat Laporan</a>
        <a href="admin\rapat-guru.php">Buat Jadwal Rapat Guru</a>
        <a href="..\logout.php">Logout</a>
    </div>

    <div class="content">
        <div class="header">
            <h1>Manage Users</h1>
        </div>

        <button class="add-user-btn" onclick="location.href='tambah-user.php'">Add New User</button>

        <hr>

        <div class="manage-users">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['role']; ?></td>
            <td class="action-btns">
                <a href="edit-user.php?id=<?= $row['id']; ?>" class="edit-btn">Edit</a>
                <a href="delete-user.php?id=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
    <?php } ?>
</tbody>
            </table>
        </div>
    </div>
</body>

</html>
