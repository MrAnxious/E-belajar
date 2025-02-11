<!-- <?php
// session_start();
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
//     header("Location: login.php");
//     exit;
// }
?> -->


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa | E-Learning SMPN 1 Mayong</title>
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

        /* Container styles */
        .container {
            max-width: 37.5rem;
            margin: 1.25rem auto;
            padding: 1.25rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #343a40;
            text-align: center;
        }


        /* Profile styles */
        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.25rem;
        }

        .profile img {
            width: 9.375rem;
            height: 9.375rem;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            width: 100%;
            text-align: left;
            padding: 0 1.25rem;
        }

        .profile-info p {
            margin-bottom: 0.625rem;
        }

        /* Form styles */
        .form-container {
            margin-top: 1.875rem;
        }

        .form-container h2 {
            color: var(--primary-color);
            margin-bottom: 1.25rem;
            text-align: center;
        }

        .form-container label {
            display: block;
            margin-bottom: 0.313rem;
            color: var(--text-color);
            font-weight: bold;
            font-size: 0.75rem;
        }

        .form-container input {
            width: 100%;
            padding: 0.625rem;
            margin-bottom: 1.25rem;
            border: 0.125rem solid var(--primary-color);
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Button styles */
        .button {
            width: 100%;
            padding: 0.625rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color var(--transition-speed) ease;
        }

        .button:hover {
            background-color: #495057;
        }

        /* Footer styles */
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
        }

        @media (max-width: 480px) {
            .container {
                margin: 5px;
                padding: 10px;
            }

            .profile img {
                width: 6.25rem;
                height: 6.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-content">
            <div class="logo">
                <img src="../asset/Logo-Smp.png" alt="Logo SMPN 1 Mayong">
                Dashboard Siswa
            </div>
            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav-links">
                <a href="../dashboard/siswa.php">Beranda</a>
                <a href="../siswa/profile.php">Profile</a>
                <a href="../siswa/cek-tugas.php">Tugas</a>
                <a href="../siswa/cek-materi.php">Materi</a>
                <a href="../siswa/mapel.php">Mapel</a>
                <a href="../siswa/cek-nilai.php">Penilaian</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <h1>Profile Siswa</h1>
        <div class="profile">
            <img src="https://w7.pngwing.com/pngs/247/564/png-transparent-computer-icons-user-profile-user-avatar-blue-heroes-electric-blue.png" alt="Foto Profil">
            <div class="profile-info">
                <p><strong>Nama:</strong> Nadia</p>
                <p><strong>NISN: </strong> 123456789012</p>
                <p><strong>Email:</strong> vincent@example.com</p>
                <p><strong>Kelas : </strong> 9A</p>
                <p><strong>Wali Kelas:</strong> Bapak Vincent</p>
            </div>
        </div>
        <br>
        <button class="button">Edit Profil</button>
        
        <div class="form-container">
            <hr>
            <br>
            <h2>Ganti Password</h2>
            <form action="#" method="POST">
                <label for="current-password">Password Saat Ini:</label>
                <input type="password" id="current-password" name="current-password" required>
                
                <label for="new-password">Password Baru:</label>
                <input type="password" id="new-password" name="new-password" required>
                
                <label for="confirm-password">Konfirmasi Password Baru:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                
                <button type="submit" class="button">Ganti Password</button>
            </form>
        </div>
    </div>

    <br>
    <br>

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
    </script>
</body>
</html>