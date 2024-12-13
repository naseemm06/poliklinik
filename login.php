<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dokter - Udinus Poliklinik</title>
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
            background: linear-gradient(135deg, #517f5a 0%, #2c442f 100%);
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
            background: linear-gradient(135deg, rgba(81, 127, 90, 0.9) 0%, rgba(44, 68, 47, 0.9) 100%);
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

        .text-success {
            color: #517f5a;
            font-weight: 600;
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
            border-color: #517f5a;
            background: #fff;
            box-shadow: 0 2px 4px rgba(81, 127, 90, 0.1);
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
            background: #517f5a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            background: #446b4c;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(81, 127, 90, 0.3);
        }

        .patient-link {
            text-align: center;
            margin-top: 2rem;
        }

        .patient-link a {
            color: #517f5a;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .patient-link a:hover {
            color: #446b4c;
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
                <h2>Area Dokter</h2>
                <p>Selamat datang di portal khusus dokter. Bersama kita berikan pelayanan terbaik untuk pasien.</p>
            </div>
        </div>
        <div class="right-container">
            <div class="login-form">
                <h4>Login Dokter</h4>
                <p class="login-box-msg">Silahkan login sebagai <span class="text-success">Dokter</span> untuk melayani pasien</p>

                <form action="pages/login/checkLogin.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                        <i class="fas fa-user-md"></i>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <i class="fas fa-lock"></i>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-stethoscope"></i>
                        Masuk sebagai Dokter
                    </button>
                </form>

                <div class="patient-link">
                    <a href="loginUser.php">
                        <i class="fas fa-hospital-user"></i>
                        Login sebagai Pasien
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>