<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Tugas | E-Learning SMPN 1 Mayong</title>
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

        /* Tugas styles */
        .tugas-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .tugas-item {
            background-color: var(--secondary-color);
            padding: 1rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .tugas-item h3 {
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .tugas-item p {
            margin-bottom: 0.5rem;
        }

        .tugas-item .status {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: bold;
        }

        .tugas-item .status.terlambat {
            background-color: #ff6b6b;
            color: white;
        }

        .tugas-item .status.selesai {
            background-color: #4caf50;
            color: white;
        }

        .tugas-item .status.belum {
            background-color: #ffc107;
            color: black;
        }

        .tugas-item .actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .tugas-item .actions button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color var(--transition-speed) ease;
        }

        .tugas-item .actions button.download {
            background-color: var(--primary-color);
            color: white;
        }

        .tugas-item .actions button.download:hover {
            background-color: #495057;
        }

        .tugas-item .actions button.upload {
            background-color: #28a745;
            color: white;
        }

        .tugas-item .actions button.upload:hover {
            background-color: #218838;
        }

        .tugas-item .upload-section {
            margin-top: 1rem;
            display: none;
        }

        .tugas-item .upload-section.active {
            display: block;
        }

        .tugas-item .upload-section input[type="file"] {
            margin-bottom: 0.5rem;
        }

        .tugas-item .upload-section button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }

        .tugas-item .upload-section button:hover {
            background-color: #495057;
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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1002;
        }

        .modal-content {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            max-width: 800px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: var(--shadow);
        }

        .modal-content iframe {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 4px;
        }

        .modal-content button.close {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 1rem;
            float: right;
        }

        .modal-content button.close:hover {
            background-color: #495057;
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
                <a href="../siswa/cek-tugas.php" class="active">Tugas</a>
                <a href="../siswa/cek-materi.php">Materi</a>
                <a href="../siswa/mapel.php">Mapel</a>
                <a href="../siswa/cek-nilai.php">Penilaian</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <h1>Cek Tugas</h1>
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

        <!-- Daftar Tugas -->
        <div class="tugas-list">
            <div class="tugas-item">
                <h3>Matematika - Tugas 1: Bilangan Bulat</h3>
                <p>Diupload oleh: Bapak Vincent</p>
                <p>Batas Pengumpulan: 15 Oktober 2023</p>
                <p>Status: <span class="status terlambat">Terlambat</span></p>
                <div class="actions">
                    <button class="download" onclick="window.location.href='../tugas/matematika-tugas1.pdf'">Download Tugas</button>
                    <button class="view" onclick="viewTugas('../tugas/matematika-tugas1.pdf')">Lihat Tugas</button>
                    <button class="upload" onclick="toggleUpload(this)">Upload Tugas</button>
                </div>
                <div class="upload-section">
                    <input type="file" id="file-matematika-tugas1" accept=".pdf,.doc,.docx">
                    <button onclick="uploadFile('file-matematika-tugas1')">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan tugas -->
    <div id="tugasModal" class="modal">
        <div class="modal-content">
            <iframe id="tugasIframe" src=""></iframe>
            <button class="close" onclick="closeModal()">Tutup</button>
        </div>
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

        // Filter tugas berdasarkan mata pelajaran
        const filterMapel = document.getElementById('mapel');
        const tugasItems = document.querySelectorAll('.tugas-item');

        filterMapel.addEventListener('change', () => {
            const selectedMapel = filterMapel.value;

            tugasItems.forEach(item => {
                const mapel = item.querySelector('h3').textContent.toLowerCase();
                if (selectedMapel === 'all' || mapel.includes(selectedMapel)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Toggle upload section
        function toggleUpload(button) {
            const uploadSection = button.closest('.tugas-item').querySelector('.upload-section');
            uploadSection.classList.toggle('active');
        }

        // Upload file functionality
        function uploadFile(inputId) {
            const fileInput = document.getElementById(inputId);
            const file = fileInput.files[0];
            if (file) {
                alert(`File "${file.name}" berhasil diupload!`);
                // Di sini Anda bisa menambahkan logika untuk mengirim file ke server
            } else {
                alert("Silakan pilih file terlebih dahulu!");
            }
        }

        // Fungsi untuk membuka modal dan menampilkan tugas
        function viewTugas(fileUrl) {
            const modal = document.getElementById('tugasModal');
            const iframe = document.getElementById('tugasIframe');
            iframe.src = fileUrl;
            modal.style.display = 'flex';
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            const modal = document.getElementById('tugasModal');
            const iframe = document.getElementById('tugasIframe');
            iframe.src = ''; // Kosongkan iframe
            modal.style.display = 'none';
        }

        // Tutup modal saat mengklik di luar modal
        window.addEventListener('click', (e) => {
            const modal = document.getElementById('tugasModal');
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>