<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Profil Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #e4e4e4;
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 25px;
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Sidebar Kiri */
        .sidebar {
            background: linear-gradient(145deg, #0f3460 0%, #16213e 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .profile-photo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin: 0 auto 25px;
            display: block;
            border: 5px solid #e94560;
            box-shadow: 0 8px 25px rgba(233, 69, 96, 0.4);
            object-fit: cover;
        }

        .profile-info h2 {
            text-align: center;
            color: #e94560;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .profile-info p {
            text-align: center;
            margin: 8px 0;
            font-size: 16px;
            color: #b8b8b8;
        }

        .profile-info .highlight {
            color: #00d4ff;
            font-weight: bold;
            font-size: 18px;
        }

        .ipk-box {
            background: linear-gradient(135deg, #e94560 0%, #ff6b6b 100%);
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
            box-shadow: 0 5px 20px rgba(233, 69, 96, 0.4);
        }

        .ipk-box .ipk-label {
            color: #fff;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .ipk-box .ipk-value {
            color: #fff;
            font-size: 36px;
            font-weight: bold;
            margin: 5px 0;
        }

        .ipk-box .ipk-predikat {
            color: #1a1a2e;
            font-size: 16px;
            font-weight: bold;
            background: rgba(255, 255, 255, 0.9);
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 8px;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e94560, transparent);
            margin: 20px 0;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            color: #00d4ff;
            font-size: 24px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: #e94560;
            transform: scale(1.2);
        }

        /* Konten Utama */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .panel {
            background: linear-gradient(145deg, #0f3460 0%, #16213e 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .panel:hover {
            transform: translateY(-5px);
        }

        .panel-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 12px;
        }

        .panel-header i {
            color: #e94560;
            font-size: 28px;
        }

        .panel-header h3 {
            color: #00d4ff;
            font-size: 24px;
        }

        /* Typewriter Effect */
        .typewriter {
            font-size: 18px;
            line-height: 1.8;
            color: #e4e4e4;
            min-height: 60px;
        }

        .typewriter::after {
            content: '|';
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Skills Progress Bar */
        .skill-item {
            margin-bottom: 25px;
        }

        .skill-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .skill-name {
            color: #00d4ff;
            font-weight: bold;
            font-size: 16px;
        }

        .skill-percentage {
            color: #e94560;
            font-weight: bold;
        }

        .progress-bar {
            background: #1a1a2e;
            height: 12px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #e94560, #00d4ff);
            border-radius: 10px;
            width: 0;
            transition: width 2s ease;
            box-shadow: 0 0 10px rgba(233, 69, 96, 0.6);
        }

        /* Lokasi */
        .location-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .location-item {
            background: #1a1a2e;
            padding: 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-left: 4px solid #e94560;
            transition: all 0.3s ease;
        }

        .location-item:hover {
            transform: translateX(5px);
            border-left-width: 6px;
        }

        .location-item i {
            font-size: 32px;
            color: #00d4ff;
        }

        .location-info h4 {
            color: #e94560;
            margin-bottom: 5px;
        }

        .location-info p {
            color: #b8b8b8;
        }

        .location-info a {
            color: #00d4ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .location-info a:hover {
            color: #e94560;
        }

        /* Tombol Admin */
        .admin-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #e94560 0%, #ff6b6b 100%);
            color: white;
            padding: 15px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 8px 25px rgba(233, 69, 96, 0.4);
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .admin-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(233, 69, 96, 0.6);
            background: linear-gradient(135deg, #ff6b6b 0%, #e94560 100%);
        }

        @media (max-width: 968px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                position: relative;
                top: 0;
            }

            .location-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Kiri -->
        <div class="sidebar">
            <img src="foto_irvan.jpg" alt="Foto Irvan Saputra" class="profile-photo">
            <div class="profile-info">
                <h2><?php echo htmlspecialchars($data['nama']); ?></h2>
                <p><strong>NIM:</strong> <?php echo htmlspecialchars($data['nim']); ?></p>
                <p><strong>Jurusan:</strong> <?php echo htmlspecialchars($data['jurusan']); ?></p>
                
                <!-- IPK Box -->
                <div class="ipk-box">
                    <div class="ipk-label">Indeks Prestasi Kumulatif</div>
                    <div class="ipk-value"><?php echo htmlspecialchars($data['ipk']); ?></div>
                    <div class="ipk-predikat"><?php echo htmlspecialchars($data['ipk_predikat']); ?></div>
                </div>
                
                <div class="divider"></div>
                <div class="social-links">
                    <a href="<?php echo htmlspecialchars($data['sosmed_link']); ?>" target="_blank" title="Social Media">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="mailto:<?php echo htmlspecialchars($data['email'] ?? 'irvan@email.com'); ?>" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="<?php echo htmlspecialchars($data['sosmed_link']); ?>" target="_blank" title="Link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="main-content">
            <!-- Panel Ringkasan -->
            <div class="panel">
                <div class="panel-header">
                    <i class="fas fa-user-graduate"></i>
                    <h3>Ringkasan</h3>
                </div>
                <div class="typewriter" id="typewriter"></div>
            </div>

            <!-- Panel Skills -->
            <div class="panel">
                <div class="panel-header">
                    <i class="fas fa-code"></i>
                    <h3>Keahlian</h3>
                </div>
                <div class="skills-container">
                    <div class="skill-item">
                        <div class="skill-header">
                            <span class="skill-name">PHP Development</span>
                            <span class="skill-percentage">85%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" data-progress="85"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-header">
                            <span class="skill-name">SQL Database</span>
                            <span class="skill-percentage">80%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" data-progress="80"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-header">
                            <span class="skill-name">UI/UX Design</span>
                            <span class="skill-percentage">75%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" data-progress="75"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel Lokasi & Info Tambahan -->
            <div class="panel">
                <div class="panel-header">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Lokasi & Informasi</h3>
                </div>
                <div class="location-grid">
                    <div class="location-item">
                        <i class="fas fa-university"></i>
                        <div class="location-info">
                            <h4>Kampus</h4>
                            <p><?php echo htmlspecialchars($data['nama_kampus']); ?></p>
                        </div>
                    </div>
                    <div class="location-item">
                        <i class="fas fa-city"></i>
                        <div class="location-info">
                            <h4>Kota</h4>
                            <p><?php echo htmlspecialchars($data['alamat_kota']); ?></p>
                        </div>
                    </div>
                    <div class="location-item">
                        <i class="fas fa-heart"></i>
                        <div class="location-info">
                            <h4>Hobi Utama</h4>
                            <p><?php echo htmlspecialchars($data['hobi_utama']); ?></p>
                        </div>
                    </div>
                    <div class="location-item">
                        <i class="fas fa-share-alt"></i>
                        <div class="location-info">
                            <h4>Media Sosial</h4>
                            <p><a href="<?php echo htmlspecialchars($data['sosmed_link']); ?>" target="_blank">Kunjungi Profil</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Admin -->
            <div class="panel">
                <a href="admin.php" class="admin-button">
                    <i class="fas fa-user-shield"></i>
                    Masuk ke Panel Admin
                </a>
            </div>
        </div>
    </div>

    <script>
        // Typewriter Effect
        const text = "Saya adalah mahasiswa <?php echo htmlspecialchars($data['jurusan']); ?> yang bersemangat dalam dunia teknologi dan pengembangan web. Dengan IPK <?php echo htmlspecialchars($data['ipk']); ?> (<?php echo htmlspecialchars($data['ipk_predikat']); ?>), saya terus mengasah kemampuan dalam programming dan desain untuk menciptakan solusi digital yang inovatif.";
        const typewriterElement = document.getElementById('typewriter');
        let index = 0;

        function typeWriter() {
            if (index < text.length) {
                typewriterElement.textContent += text.charAt(index);
                index++;
                setTimeout(typeWriter, 50);
            }
        }

        // Animate Progress Bars
        function animateProgressBars() {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const progress = bar.getAttribute('data-progress');
                setTimeout(() => {
                    bar.style.width = progress + '%';
                }, 300);
            });
        }

        // Initialize animations when page loads
        window.addEventListener('load', () => {
            setTimeout(typeWriter, 500);
            animateProgressBars();
        });
    </script>
</body>
</html>