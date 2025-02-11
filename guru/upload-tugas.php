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
    <title>Upload Tugas | E-Learning SMPN 1 Mayong</title>
    <link rel="icon" type="image/png" href="https://smpn1mayong.sch.id/images/download-removebg-preview1.png">
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #d6d6d6;
            color: black;
            line-height: 1.6;
            padding-top: 70px;
        }

        /* Updated Navbar styles */
        .navbar {
            background-color: #343a40;
            padding: 1rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            z-index: 1001;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 1rem;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        .nav-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .nav-toggle {
            display: none;
            flex-direction: column;
            gap: 6px;
            cursor: pointer;
            z-index: 1001;
            padding: 0.5rem;
            border-radius: 4px;
        }

        .nav-toggle span {
            width: 25px;
            height: 3px;
            background-color: white;
            transition: all 0.3s ease;
            transform-origin: left;
        }

        /* Container */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Keep existing styles for form, table, etc. */
        .container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #343a40;
            text-align: center;
        }

        .upload-form {
            margin-bottom: 30px;
        }

        .upload-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }

        .upload-form input,
        .upload-form textarea,
        .upload-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #dee2e6;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .upload-form input:focus,
        .upload-form textarea:focus,
        .upload-form select:focus {
            border-color: #343a40;
            outline: none;
        }

        .upload-form button {
            width: 100%;
            padding: 10px;
            background-color: #343a40;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .upload-form button:hover {
            background-color: #495057;
        }

        /* Table styles */
        .late-submissions {
            margin-top: 30px;
            overflow-x: auto;
        }

        .late-submissions h2 {
            margin-bottom: 15px;
            font-size: 24px;
            color: #343a40;
        }

        .late-submissions table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        .late-submissions th,
        .late-submissions td {
            padding: 10px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        .late-submissions th {
            background-color: #343a40;
            color: white;
        }

        .late-submissions tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .late-submissions tr:hover {
            background-color: #f1f1f1;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 15px;
            background-color: #343a40;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .nav-toggle {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 100%;
                max-width: 300px;
                background-color: #343a40;
                flex-direction: column;
                padding: 5rem 2rem;
                transition: right 0.3s ease;
            }

            .nav-menu.active {
                right: 0;
            }

            .nav-toggle.active span:nth-child(1) {
                transform: rotate(45deg);
            }

            .nav-toggle.active span:nth-child(2) {
                opacity: 0;
            }

            .nav-toggle.active span:nth-child(3) {
                transform: rotate(-45deg);
            }

            .nav-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .nav-overlay.active {
                display: block;
            }

            .container {
                margin: 10px;
                padding: 15px;
            }

            .container h1 {
                font-size: 24px;
            }

            .upload-form label,
            .upload-form input,
            .upload-form textarea,
            .upload-form button {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .container h1 {
                font-size: 20px;
            }

            .late-submissions h2 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <!-- Updated Navbar Structure -->
    <div class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="../asset/Logo-Smp.png" alt="Logo">
                Dashboard Guru
            </div>
            <div class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="nav-menu">
                <a href="../dashboard/guru.php">Beranda</a>
                <a href="../guru/profile.php">Profile</a>
                <a href="../guru/upload-tugas.php">Tugas</a>
                <a href="../guru/upload-materi.php">Materi</a>
                <a href="../guru/penilaian.php">Penilaian</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </div>
    </div>
    <div class="nav-overlay"></div>

    <div class="container">
        <h1>Upload Tugas</h1>

        <div class="upload-form">
            <form action="#" method="POST">
                <label for="mata-pelajaran">Mata Pelajaran:</label>
                <select id="mata-pelajaran" name="mata-pelajaran" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="PKn">PKn</option>
                    <option value="Seni Budaya">Seni Budaya</option>
                    <option value="PJOK">PJOK</option>
                    <option value="TIK">TIK</option>
                </select>

                <label for="judul-tugas">Judul Tugas:</label>
                <input type="text" id="judul-tugas" name="judul-tugas" required>

                <label for="deskripsi-tugas">Deskripsi Tugas:</label>
                <textarea id="deskripsi-tugas" name="deskripsi-tugas" rows="4" required></textarea>

                <label for="deadline">Batas Waktu Pengumpulan:</label>
                <input type="datetime-local" id="deadline" name="deadline" required>

                <label for="file-tugas">Upload File Tugas (Opsional):</label>
                <input type="file" id="file-tugas" name="file-tugas">

                <button type="submit">Upload Tugas</button>
            </form>
        </div>

        <div class="late-submissions">
            <h1>Siswa yang Telat Mengumpulkan</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Tanggal Pengumpulan</th>
                        <th>Status</th>
                        <th>Cek Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Andi</td>
                        <td>9A</td>
                        <td>2023-10-05 10:15</td>
                        <td style="color: red;">Telat</td>
                        <td><a href="#" style="color: blue;">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>Budi</td>
                        <td>9B</td>
                        <td>2023-10-05 09:55</td>
                        <td style="color: green;">Tepat Waktu</td>
                        <td><a href="#" style="color: blue;">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>Cindy</td>
                        <td>9A</td>
                        <td>2023-10-06 08:30</td>
                        <td style="color: red;">Telat</td>
                        <td><a href="#" style="color: blue;">Lihat</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <br>

    <div class="footer">
        &copy; <span id="year"></span> SMPN 1 Mayong.
    </div>

    <script>
        // Set current year in footer
        document.getElementById("year").textContent = new Date().getFullYear();

        // Navbar Toggle Functionality
        const navToggle = document.querySelector('.nav-toggle');
        const navMenu = document.querySelector('.nav-menu');
        const navOverlay = document.querySelector('.nav-overlay');

        function toggleMenu() {
            navToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
            navOverlay.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : 'auto';
        }

        navToggle.addEventListener('click', toggleMenu);
        navOverlay.addEventListener('click', toggleMenu);

        // Close menu when clicking a link
        const navLinks = document.querySelectorAll('.nav-menu a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navMenu.classList.contains('active')) {
                    toggleMenu();
                }
            });
        });

        // Close menu when window is resized to desktop view
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && navMenu.classList.contains('active')) {
                toggleMenu();
            }
        });
    </script>
</body>
</html>