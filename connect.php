<?php
	$servername = 'itp460.usc.edu';
	$username = 'student';
	$password = 'ttrojan';
	$dbname = 'dvd';


	$conn = new mysqli($servername, $username, $password);

	if(mysqli_connect_errno()) {
		echo "Could not connect to MYSQL: " . mysqli_connect_error();
	}

	mysqli_select_db($conn,$dbname);

?>


