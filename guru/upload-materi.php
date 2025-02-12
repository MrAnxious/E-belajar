<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Materi | E-Learning SMPN 1 Mayong</title>
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

        /* Original container styles */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #343a40;
            text-align: center;
        }

        /* Form styles */
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

        /* Preview section */
        .materi-preview {
            margin-top: 30px;
        }

        .materi-preview h2 {
            margin-bottom: 15px;
            font-size: 24px;
            color: #343a40;
        }

        .materi-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #f8f9fa;
        }

        .materi-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }

        .materi-info h3 {
            margin-bottom: 8px;
            font-size: 18px;
            color: #343a40;
        }

        .materi-info p {
            font-size: 14px;
            color: #6c757d;
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

            .materi-item img {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 480px) {
            .container h1 {
                font-size: 20px;
            }

            .upload-form input,
            .upload-form textarea,
            .upload-form button {
                font-size: 14px;
            }

            .materi-item {
                flex-direction: column;
                text-align: center;
            }

            .materi-item img {
                margin-bottom: 10px;
                margin-right: 0;
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
        <h1>Upload Materi</h1>

        <div class="upload-form">
            <form id="uploadMateriForm" action="#" method="POST" enctype="multipart/form-data">
                <label for="judul-materi">Judul Materi:</label>
                <input type="text" id="judul-materi" name="judul-materi" required>

                <label for="deskripsi-materi">Deskripsi Materi:</label>
                <textarea id="deskripsi-materi" name="deskripsi-materi" rows="4" required></textarea>

                <label for="file-materi">Upload File Materi (PDF/Gambar):</label>
                <input type="file" id="file-materi" name="file-materi" accept=".pdf,.jpg,.jpeg,.png" required>

                <button type="submit">Upload Materi</button>
            </form>
        </div>

        <div class="materi-preview">
            <h1>Materi yang Telah Diunggah</h1>
            <div id="materiList"></div>
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

        // Handle form submission
        document.getElementById("uploadMateriForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const judul = document.getElementById("judul-materi").value;
            const deskripsi = document.getElementById("deskripsi-materi").value;
            const file = document.getElementById("file-materi").files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const materiList = document.getElementById("materiList");
                    const materiItem = document.createElement("div");
                    materiItem.className = "materi-item";

                    const imgSrc = file.type === "application/pdf"
                        ? "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png"
                        : e.target.result;

                    materiItem.innerHTML = `
                        <img src="${imgSrc}" alt="${file.type === "application/pdf" ? "PDF Icon" : "Preview"}">
                        <div class="materi-info">
                            <h3>${judul}</h3>
                            <p>${deskripsi}</p>
                            <p>File: ${file.name}</p>
                        </div>
                    `;

                    materiList.appendChild(materiItem);
                    alert("Materi berhasil diunggah!");
                };
                reader.readAsDataURL(file);
            } else {
                alert("Gagal mengunggah materi. Silakan coba lagi.");
            }

            document.getElementById("uploadMateriForm").reset();
        });
    </script>
</body>
</html>
