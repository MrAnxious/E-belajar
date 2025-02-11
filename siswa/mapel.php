<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mapel | E-Learning SMPN 1 Mayong</title>
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

        /* Container styles */
        .container {
            max-width: 1000px;
            margin: 1.25rem auto;
            padding: 1.25rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .container h1 {
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            color: var(--text-color);
            text-align: center;
        }

        /* Class selector styles */
        .class-selector {
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .class-selector select {
            padding: 0.5rem;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Schedule table styles */
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .schedule-table th,
        .schedule-table td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: center;
        }

        .schedule-table th {
            background-color: var(--primary-color);
            color: white;
        }

        .schedule-table tr:nth-child(even) {
            background-color: var(--secondary-color);
        }

        .schedule-table tr:hover {
            background-color: #e9ecef;
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

            .schedule-table {
                display: block;
                overflow-x: auto;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin: 0.313rem;
                padding: 0.625rem;
            }

            .class-selector {
                flex-direction: column;
                align-items: center;
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
                <a href="../siswa/mapel.php" class="active">Mapel</a>
                <a href="../siswa/cek-nilai.php">Penilaian</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <h1>Jadwal Mata Pelajaran</h1>
        
        <div class="class-selector">
            <select id="kelas" name="kelas">
                <option value="">Pilih Kelas</option>
                <option value="7A">Kelas 7A</option>
                <option value="7B">Kelas 7B</option>
                <option value="7C">Kelas 7C</option>
                <option value="7D">Kelas 7D</option>
                <option value="7E">Kelas 7E</option>
                <option value="7F">Kelas 7F</option>
                <option value="7G">Kelas 7G</option>
                <option value="7H">Kelas 7H</option>
                <option value="7I">Kelas 7I</option>
                <option value="8A">Kelas 8A</option>
                <option value="8B">Kelas 8B</option>
                <option value="8C">Kelas 8C</option>
                <option value="8D">Kelas 8D</option>
                <option value="8E">Kelas 8E</option>
                <option value="8F">Kelas 8F</option>
                <option value="8G">Kelas 8G</option>
                <option value="8H">Kelas 8H</option>
                <option value="8I">Kelas 8I</option>
                <option value="9A">Kelas 9A</option>
                <option value="9B">Kelas 9B</option>
                <option value="9C">Kelas 9C</option>
                <option value="9D">Kelas 9D</option>
                <option value="9E">Kelas 9E</option>
                <option value="9F">Kelas 9F</option>
                <option value="9G">Kelas 9G</option>
                <option value="9H">Kelas 9H</option>
                <option value="9I">Kelas 9I</option>
            </select>
        </div>

        <table class="schedule-table">
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                </tr>
            </thead>
            <tbody id="scheduleBody">
                <!-- Jadwal akan diisi melalui JavaScript -->
            </tbody>
        </table>
    </div>
    <br>
    <br>
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

        // Sample schedule data (you would typically fetch this from a database)
        const scheduleData = {
            "7A": [
                ["07:00 - 07:45", "Upacara", "Matematika", "B. Indonesia", "IPA", "Penjaskes"],
                ["07:45 - 08:30", "Matematika", "Matematika", "B. Indonesia", "IPA", "Penjaskes"],
                ["08:30 - 09:15", "Matematika", "IPS", "B. Inggris", "PAI", "B. Jawa"],
                ["09:15 - 10:00", "IPA", "IPS", "B. Inggris", "PAI", "B. Jawa"],
                ["10:15 - 11:00", "IPA", "B. Indonesia", "Prakarya", "Seni Budaya", "-"],
                ["11:00 - 11:45", "PKN", "B. Indonesia", "Prakarya", "Seni Budaya", "-"]
            ],
            // Add more class schedules as needed
        };

        // Function to update schedule table
        function updateSchedule(kelas) {
            const scheduleBody = document.getElementById('scheduleBody');
            scheduleBody.innerHTML = '';

            if (scheduleData[kelas]) {
                scheduleData[kelas].forEach(row => {
                    const tr = document.createElement('tr');
                    row.forEach(cell => {
                        const td = document.createElement('td');
                        td.textContent = cell;
                        tr.appendChild(td);
                    });
                    scheduleBody.appendChild(tr);
                });
            }
        }

        // Event listener for class selection
        document.getElementById('kelas').addEventListener('change', (e) => {
            updateSchedule(e.target.value);
        });
    </script>
</body>
</html>