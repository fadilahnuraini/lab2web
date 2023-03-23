<!DOCTYPE html>
<html>
<head>
	<title>Hitung Umur dan Gaji</title>
	<style>
		body {
			text-align: center;
		}
		form {
			display: inline-block;
			text-align: left;
		}
		input[type="submit"] {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<h1>Hitung Umur dan Gaji</h1>
	<form method="POST">
		<label for="name">Nama:</label><br>
		<input type="text" id="name" name="name" required><br>
		<label for="birthdate">Tanggal Lahir:</label><br>
		<input type="date" id="birthdate" name="birthdate" required><br>
		<label for="job">Pekerjaan:</label><br>
		<select id="job" name="job" required>
			<option value="">-- Pilih Pekerjaan --</option>
			<option value="Pegawai">Pegawai </option>
			<option value="Manager">Manager </option>
			<option value="Direktur">Direktur</option>
		</select><br>
		<input type="submit" value="Hitung">
	</form>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST["name"];
			$birthdate = $_POST["birthdate"];
			$job = $_POST["job"];

			// hitung umur
			$birthyear = substr($birthdate, 0, 4);
			$currentyear = date("Y");
			$age = $currentyear - $birthyear;

			// hitung gaji
			switch ($job) {
				case 'Pegawai':
					$salary = 5000000;
					break;
				case 'Manager':
					$salary = 10000000;
					break;
				case 'Direktur':
					$salary = 20000000;
					break;
			}

			// tampilkan hasil
			echo "<br><hr><br>";
			echo "<h2>Hasil:</h2>";
			echo "<p>Nama: $name</p>";
			echo "<p>Umur: $age tahun</p>";
			echo "<p>Pekerjaan: $job</p>";
			echo "<p>Gaji: Rp. " . number_format($salary, 0, ",", ".") . "/bulan</p>";
		}
	?>
</body>
</html>
