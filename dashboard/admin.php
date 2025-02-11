<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | E-Learning SMPN 1 Mayong</title>
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
            padding-top: 70px; /* Add padding for fixed navbar */
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

        /* Clock styles */
        .clock-wrapper {
            display: inline-block;
            padding: 1rem;
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            background-color: var(--secondary-color);
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
        }

        #day-time {
            font-size: 2rem;
            color: var(--text-color);
        }

        #day {
            margin-right: 0.625rem;
        }

        .digit {
            display: inline-block;
            width: 1.25rem;
            height: 2.5rem;
            background-color: var(--background-color);
            margin: 0 0.125rem;
            border-radius: 4px;
            line-height: 2.5rem;
            font-size: 1.875rem;
            font-weight: bold;
            text-align: center;
        }

        .colon {
            display: inline-block;
            width: 0.625rem;
            height: 2.5rem;
            line-height: 2.5rem;
            font-size: 1.875rem;
            font-weight: bold;
            text-align: center;
        }

        /* Container styles */
        .container {
            max-width: 1100px;
            margin: 1.25rem auto;
            padding: 1.25rem;
            background-color: var(--secondary-color);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h1 {
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            color: var(--text-color);
        }

        /* Footer styles */
        .footer {
            text-align: center;
            padding: 1rem;
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
                margin: 0.625rem;
                padding: 0.938rem;
            }

            .container h1 {
                font-size: 1.5rem;
            }

            #day-time, .digit, .colon {
                font-size: 1.5rem;
                height: 1.875rem;
                line-height: 1.875rem;
            }
        }

        @media (max-width: 480px) {
            .container h1 {
                font-size: 1.25rem;
            }

            #day-time, .digit, .colon {
                font-size: 1.25rem;
                height: 1.563rem;
                line-height: 1.563rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-content">
            <div class="logo">
                <img src="../asset/Logo-Smp.png" alt="Logo SMPN 1 Mayong">
                Dashboard Admin
            </div>
            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav-links">
                <a href="../dashboard/admin">Beranda</a>
                <a href="../guru/profile.php">Profile</a>
                <a href="../guru/upload-tugas.php">Users</a>
                <a href="../guru/upload-materi.php">Jadwal</a>
                <a href="../guru/penilaian.php">-</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <h1>Selamat Datang</h1>
        <h1><?= $_SESSION['nama']; ?></h1>
        <div class="clock-wrapper">
            <div id="day-time">
                <span id="day"></span>
                <span id="clock"></span>
            </div>
        </div>
        <h5>Ini adalah halaman dashboard untuk guru. Anda dapat mengelola tugas, materi, dan penilaian siswa dari sini.</h5>
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

        // Highlight current page in navigation
        const currentPage = window.location.pathname;
        navLinksItems.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });

        // Clock functionality
        document.getElementById("year").textContent = new Date().getFullYear();

        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            
            const dayString = now.toLocaleDateString('id-ID', {
                weekday: 'long'
            });
            
            document.getElementById('day').textContent = dayString;
            const clockElement = document.getElementById('clock');
            clockElement.innerHTML = '';

            [...timeString].forEach(char => {
                const span = document.createElement('span');
                span.className = char === ':' ? 'colon' : 'digit';
                span.textContent = char;
                clockElement.appendChild(span);
            });
        }

        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>