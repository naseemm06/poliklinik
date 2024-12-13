<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Udinus Poliklinik - Sistem Layanan Kesehatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .hero-section {
            min-height: 500px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/images/gedung1.png');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
            position: relative;
        }

        .hero-content {
            color: white;
            max-width: 800px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-content h5 {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .login-section {
            padding: 4rem 2rem;
            background: #f8f9fa;
        }

        .login-cards {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-card i {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }

        .login-card h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .login-card p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .btn {
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .testimonials {
            padding: 4rem 2rem;
            background: white;
        }

        .testimonials h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: #333;
        }

        .testimonial-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 2rem;
            text-align: left;
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .testimonial-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }

        .testimonial-info h4 {
            color: #333;
            margin: 0;
        }

        .testimonial-info p {
            color: #666;
            margin: 0;
            font-size: 0.9rem;
        }

        .testimonial-text {
            color: #444;
            line-height: 1.6;
        }

        .notice-bar {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 1rem;
            text-align: center;
            z-index: 1000;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content h5 {
                font-size: 1.2rem;
            }

            .login-cards {
                grid-template-columns: 1fr;
            }

            .testimonial-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <section class="hero-section">
        <div class="hero-content">
            <h1>Udinus Poliklinik</h1>
            <h5>Sistem Informasi Layanan Kesehatan Modern</h5>
        </div>
    </section>

    <section class="login-section">
        <div class="login-cards">
            <div class="login-card">
                <i class="fas fa-hospital-user text-primary"></i>
                <h3>Pasien</h3>
                <p>Akses layanan kesehatan berkualitas dengan mudah dan cepat. Login untuk memulai perjalanan kesehatan Anda.</p>
                <a href="loginUser.php" class="btn btn-primary">Masuk Sebagai Pasien</a>
            </div>
            <div class="login-card">
                <i class="fas fa-stethoscope text-success"></i>
                <h3>Dokter</h3>
                <p>Area khusus untuk para profesional kesehatan. Login untuk mengelola jadwal dan memberikan pelayanan terbaik.</p>
                <a href="login.php" class="btn btn-success">Masuk Sebagai Dokter</a>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <h2>Apa Kata Mereka?</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="assets/images/ahmad.jpg" alt="Ahmad" class="testimonial-img">
                    <div class="testimonial-info">
                        <h4>Ahmad</h4>
                        <p>Semarang</p>
                    </div>
                </div>
                <p class="testimonial-text">"Mantap, berobat jauh lebih mudah di Poliklinik Udinus. Sistem antrian yang teratur dan dokter yang profesional membuat pengalaman berobat menjadi lebih nyaman."</p>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="assets/images/Syafina.jpg" alt="Syafina" class="testimonial-img">
                    <div class="testimonial-info">
                        <h4>Syafina</h4>
                        <p>Semarang</p>
                    </div>
                </div>
                <p class="testimonial-text">"Pelayanan terbaik yang pernah saya alami untuk kesehatan. Staff yang ramah dan fasilitas yang modern membuat saya merasa diperhatikan dengan baik."</p>
            </div>
        </div>
    </section>

    <div class="notice-bar">
        <i class="fas fa-shield-virus"></i> Pakai Masker - Tetap Jaga Protokol Kesehatan!
    </div>
</body>

</html>