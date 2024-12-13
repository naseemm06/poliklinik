<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Udinus Poliklinik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #588163 0%, #2d4731 100%);
            padding: 2rem;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            overflow: hidden;
        }

        .left-container {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .left-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .left-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(88, 129, 99, 0.8) 0%, rgba(45, 71, 49, 0.8) 100%);
        }

        .left-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 1;
            width: 80%;
        }

        .left-overlay h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .left-overlay p {
            font-size: 1.1rem;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .right-container {
            flex: 1;
            padding: 4rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .login-form h4 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .login-box-msg {
            color: #666;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #555;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-bottom: 2px solid #eee;
            background: #f8f9fa;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #588163;
            background: #fff;
            box-shadow: 0 2px 4px rgba(88, 129, 99, 0.1);
        }

        .form-group i {
            position: absolute;
            right: 12px;
            top: 35px;
            color: #888;
        }

        .btn-login {
            width: 100%;
            padding: 1rem;
            background: #588163;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background: #4a6e53;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(88, 129, 99, 0.3);
        }

        .register-section {
            text-align: center;
            margin-top: 2rem;
            color: #666;
        }

        .register-section a {
            color: #588163;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .register-section a:hover {
            color: #4a6e53;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .left-container {
                min-height: 200px;
            }

            .right-container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="left-container">
            <img src="assets/images/logo_poli.jpg" alt="Login Image">
            <div class="left-overlay">
                <h2>Selamat Datang</h2>
                <p>Sistem Informasi Layanan Kesehatan Terpadu untuk Masa Depan yang Lebih Sehat</p>
            </div>
        </div>
        <div class="right-container">
            <div class="login-form">
                <h4>Login Pasien</h4>
                <p class="login-box-msg">Silahkan login untuk mengakses layanan kesehatan</p>

                <form action="pages/loginUser/checkLoginUser.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <i class="fas fa-lock"></i>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Masuk
                    </button>
                </form>

                <div class="register-section">
                    <p>Belum punya akun?</p>
                    <a href="register.php">Registrasi sekarang</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>