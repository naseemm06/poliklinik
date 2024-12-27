<!DOCTYPE html>
<html>

<head>
    <title>Login Poliklinik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            width: 868px;
            max-width: 100%;
            min-height: 580px;
        }

        h4 {
            color: #2d3436;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        p {
            color: #636e72;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 1rem 0;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 60px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            margin: 8px 0;
            width: 100%;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #74b9ff;
            box-shadow: 0 0 0 3px rgba(116, 185, 255, 0.1);
        }

        button {
            border-radius: 30px;
            border: none;
            background: linear-gradient(135deg, #0984e3, #74b9ff);
            color: #FFFFFF;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 14px 50px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            cursor: pointer;
            margin-top: 1rem;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.1);
        }

        button.ghost {
            background: transparent;
            border: 2px solid #FFFFFF;
            background-color: rgba(255, 255, 255, 0.1);
        }

        button.ghost:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: linear-gradient(135deg, #0984e3, #74b9ff);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        /* Animation */
        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                min-height: 800px;
                width: 90%;
            }

            .form-container {
                width: 100%;
            }

            .overlay-container {
                display: none;
            }

            form {
                padding: 0 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="pages/register/checkRegister.php" method="post">
                <h4>Registrasi Pasien</h4>
                <p>Lengkapi data diri Anda untuk membuat akun baru</p>
                <input type="text" name="nama" placeholder="Nama Lengkap" required />
                <input type="number" name="no_ktp" placeholder="No. KTP" required>
                <input type="text" name="alamat" placeholder="Alamat" required />
                <input type="password" name="password" placeholder="Kata Sandi" required />
                <input type="number" name="no_hp" placeholder="No. Handphone" required>
                <button type="submit">Daftar Sekarang</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="pages/loginUser/checkLoginUser.php" method="post">
                <h4>Selamat Datang Kembali</h4>
                <p>Masuk ke akun Anda</p>
                <input type="text" name="username" placeholder="Nama Pengguna" required />
                <input type="password" name="password" placeholder="Kata Sandi" required />
                <button type="submit">Masuk</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h4>Sudah memiliki akun?</h4>
                    <p>Silakan masuk dengan akun Anda untuk mengakses layanan kesehatan kami</p>
                    <button class="ghost" id="signIn">Masuk</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h4>Belum memiliki akun?</h4>
                    <p>Daftarkan diri Anda sekarang untuk memulai perjalanan kesehatan bersama kami</p>
                    <button class="ghost" id="signUp">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>