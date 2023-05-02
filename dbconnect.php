<?php
	function connectToDatabase() {
		$servername = "10.0.19.74";
		$username = "mul01563";
		$password = "mul01563";
		$dbname = "db_mul01563";
		
		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected to database successfully <br><br>";
		return $conn;
	}
?>