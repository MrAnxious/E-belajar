<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Siswa | E-Learning SMPN 1 Mayong</title>
    <link rel="icon" type="image/png" href="https://smpn1mayong.sch.id/images/download-removebg-preview1.png">
    <style>
        /* Base styles */
        :root {
            --primary-color: #343a40;
            --secondary-color: #f8f9fa;
            --text-color: #343a40;
            --background-color: #d6d6d6;
            --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Tahoma', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            padding-top: 70px;
        }

        /* Navbar styles */
        .navbar {
            background-color: var(--primary-color);
            padding: 1rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow);
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            z-index: 1001;
        }

        .navbar .logo img {
            height: 40px;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all var(--transition-speed) ease;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .nav-links a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            cursor: pointer;
            border: none;
            background: none;
            padding: 0.5rem;
            z-index: 1001;
        }

        .hamburger span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 0;
            transition: all var(--transition-speed) ease;
        }

        /* Container */
        .container {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: var(--text-color);
            text-align: center;
        }

        /* Table styles */
        .penilaian-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 600px;
        }

        .penilaian-table th,
        .penilaian-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .penilaian-table th {
            background-color: var(--primary-color);
            color: white;
        }

        .penilaian-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .penilaian-table tr:hover {
            background-color: #f1f1f1;
        }

        .penilaian-table input[type="number"] {
            width: 80px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        .penilaian-table button {
            padding: 5px 10px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color var(--transition-speed) ease;
        }

        .penilaian-table button:hover {
            background-color: #495057;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 100%;
                background-color: var(--primary-color);
                flex-direction: column;
                justify-content: center;
                transition: right var(--transition-speed) ease;
                padding: 2rem;
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links a {
                font-size: 1.2rem;
                width: 100%;
                text-align: center;
                padding: 1rem;
            }

            /* Hamburger animation */
            .hamburger.active span:nth-child(1) {
                transform: rotate(45deg) translate(8px, 6px);
            }

            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active span:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -5px);
            }

            .container {
                margin: 10px;
                padding: 15px;
            }

            .container h1 {
                font-size: 24px;
            }

            .penilaian-table th,
            .penilaian-table td {
                padding: 8px;
                font-size: 14px;
            }

            .penilaian-table input[type="number"] {
                width: 60px;
            }

            .penilaian-table button {
                padding: 4px 8px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .container h1 {
                font-size: 20px;
            }

            .penilaian-table th,
            .penilaian-table td {
                padding: 6px;
                font-size: 12px;
            }

            .penilaian-table input[type="number"] {
                width: 50px;
            }

            .penilaian-table button {
                padding: 3px 6px;
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-content">
            <div class="logo">
                <img src="../asset/Logo-Smp.png" alt="Logo SMPN 1 Mayong">
                Dashboard Guru
            </div>
            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav-links">
                <a href="../dashboard/guru.php">Beranda</a>
                <a href="../guru/profile.php">Profile</a>
                <a href="../guru/upload-tugas.php">Tugas</a>
                <a href="../guru/upload-materi.php">Materi</a>
                <a href="../guru/penilaian.php">Penilaian</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <h1>Penilaian Siswa</h1>
        <table class="penilaian-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Judul Tugas</th>
                    <th>Tanggal Pengumpulan</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Andi</td>
                    <td>9A</td>
                    <td>Tugas Matematika 1</td>
                    <td>2023-10-05 10:15</td>
                    <td>
                        <input type="number" id="nilai1" value="85" min="0" max="100">
                    </td>
                    <td>
                        <button onclick="simpanNilai(1)">Simpan</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Budi</td>
                    <td>9B</td>
                    <td>Tugas Matematika 1</td>
                    <td>2023-10-05 09:55</td>
                    <td>
                        <input type="number" id="nilai2" value="90" min="0" max="100">
                    </td>
                    <td>
                        <button onclick="simpanNilai(2)">Simpan</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cindy</td>
                    <td>9A</td>
                    <td>Tugas Matematika 1</td>
                    <td>2023-10-06 08:30</td>
                    <td>
                        <input type="number" id="nilai3" value="75" min="0" max="100">
                    </td>
                    <td>
                        <button onclick="simpanNilai(3)">Simpan</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; <span id="year"></span> SMPN 1 Mayong.
    </div>

    <script>
        // Hamburger menu functionality
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const navLinksItems = document.querySelectorAll('.nav-links a');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
            document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : 'auto';
        });

        // Close menu when clicking nav items
        navLinksItems.forEach(item => {
            item.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navLinks.contains(e.target) && !hamburger.contains(e.target) && navLinks.classList.contains('active')) {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        // Display current year in footer
        document.getElementById("year").textContent = new Date().getFullYear();

        // Function to save nilai
        function simpanNilai(id) {
            const nilai = document.getElementById(`nilai${id}`).value;
            if (nilai >= 0 && nilai <= 100) {
                alert(`Nilai untuk siswa ${id} berhasil disimpan: ${nilai}`);
                // Here you can add code to send the grade to the server
            } else {
                alert("Nilai harus antara 0 dan 100!");
            }
        }
    </script>
</body>
</html>