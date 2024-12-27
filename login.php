<!DOCTYPE html>
<html>

<head>
	<title>Login Dokter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		body {
			background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
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
			min-height: 480px;
		}

		h4 {
			color: #2d3436;
			font-weight: 600;
			margin-bottom: 1rem;
		}

		.medical-icon {
			color: #20bf6b;
			font-size: 2.5rem;
			margin-bottom: 1.5rem;
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

		.form-container {
			position: absolute;
			top: 0;
			left: 0;
			width: 50%;
			height: 100%;
			transition: all 0.6s ease-in-out;
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
			border-color: #20bf6b;
			box-shadow: 0 0 0 3px rgba(32, 191, 107, 0.1);
		}

		button {
			border-radius: 30px;
			border: none;
			background: linear-gradient(135deg, #20bf6b, #0fb9b1);
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
			box-shadow: 0 7px 14px rgba(32, 191, 107, 0.1);
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
			background: linear-gradient(135deg, #20bf6b, #0fb9b1);
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

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.patient-link {
			margin-top: 1rem;
			color: #20bf6b;
			text-decoration: none;
			font-size: 0.9rem;
			transition: all 0.3s ease;
		}

		.patient-link:hover {
			color: #0fb9b1;
			text-decoration: none;
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			.container {
				min-height: 400px;
				width: 90%;
			}

			.overlay-container {
				display: none;
			}

			.form-container {
				width: 100%;
			}

			form {
				padding: 0 20px;
			}
		}
	</style>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container">
			<form action="pages/login/checkLogin.php" method="post">
				<i class="fas fa-user-md medical-icon"></i>
				<h4>Portal Dokter</h4>
				<p>Selamat datang kembali! Silakan login untuk melayani pasien</p>
				<input type="text" name="username" placeholder="Username" required />
				<input type="password" name="password" placeholder="Password" required />
				<button type="submit">Masuk</button>
				<a href="loginUser.php" class="patient-link">
					<i class="fas fa-user"></i> Portal Pasien
				</a>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<i class="fas fa-hospital-user" style="font-size: 3rem; margin-bottom: 1.5rem;"></i>
					<h4>Selamat Datang, Dokter!</h4>
					<p>Sistem Informasi Poliklinik<br>Melayani dengan sepenuh hati</p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>