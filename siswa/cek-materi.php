    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cek Materi | E-Learning SMPN 1 Mayong</title>
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
                max-width: 800px;
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

            /* Materi styles */
            .materi-list {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .materi-item {
                background-color: var(--secondary-color);
                padding: 1rem;
                border-radius: 8px;
                box-shadow: var(--shadow);
            }

            .materi-item h3 {
                margin-bottom: 0.5rem;
                color: var(--primary-color);
            }

            .materi-item p {
                margin-bottom: 0.5rem;
            }

            .materi-item a {
                color: var(--primary-color);
                text-decoration: none;
                font-weight: bold;
            }

            .materi-item a:hover {
                text-decoration: underline;
            }

            /* Filter styles */
            .filter {
                margin-bottom: 1.5rem;
                display: flex;
                justify-content: center;
                gap: 1rem;
            }

            .filter label {
                font-weight: bold;
            }

            .filter select {
                padding: 0.5rem;
                border: 2px solid var(--primary-color);
                border-radius: 4px;
                font-size: 1rem;
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
            }

            @media (max-width: 480px) {
                .container {
                    margin: 0.313rem;
                    padding: 0.625rem;
                }

                .filter {
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
                    <a href="../siswa/cek-materi.php" class="active">Materi</a>
                    <a href="../siswa/mapel.php">Mapel</a>
                    <a href="../siswa/cek-nilai.php">Penilaian</a>
                    <a href="../logout.php">Logout</a>
                </nav>
            </div>
        </div>

        <div class="container">
            <h1>Cek Materi</h1>
            <!-- Filter Mata Pelajaran -->
            <div class="filter">
                <label for="mapel">Pilih Mata Pelajaran:</label>
                <select id="mapel" name="mapel">
                    <option value="all">Semua Mata Pelajaran</option>
                    <option value="matematika">Matematika</option>
                    <option value="ipa">IPA</option>
                    <option value="ips">IPS</option>
                    <option value="bahasa-indonesia">Bahasa Indonesia</option>
                    <option value="bahasa-inggris">Bahasa Inggris</option>
                </select>
            </div>

            <!-- Daftar Materi -->
            <div class="materi-list">
                <div class="materi-item">
                    <h3>Matematika - Bab 1: Bilangan Bulat</h3>
                    <p>Diupload oleh: Bapak Vincent</p>
                    <p>Tanggal: 10 Oktober 2023</p>
                    <a href="../materi/matematika-bab1.pdf" download>Download Materi</a>
                </div>
                <div class="materi-item">
                    <h3>IPA - Bab 2: Sistem Pencernaan</h3>
                    <p>Diupload oleh: Ibu Ani</p>
                    <p>Tanggal: 12 Oktober 2023</p>
                    <a href="../materi/ipa-bab2.pdf" download>Download Materi</a>
                </div>
                <div class="materi-item">
                    <h3>Bahasa Indonesia - Bab 3: Cerpen</h3>
                    <p>Diupload oleh: Ibu Rina</p>
                    <p>Tanggal: 15 Oktober 2023</p>
                    <a href="../materi/bahasa-indonesia-bab3.pdf" download>Download Materi</a>
                </div>
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

            // Filter materi berdasarkan mata pelajaran
            const filterMapel = document.getElementById('mapel');
            const materiItems = document.querySelectorAll('.materi-item');

            filterMapel.addEventListener('change', () => {
                const selectedMapel = filterMapel.value;

                materiItems.forEach(item => {
                    const mapel = item.querySelector('h3').textContent.toLowerCase();
                    if (selectedMapel === 'all' || mapel.includes(selectedMapel)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        </script>
    </body>
    </html>