<?php
	// DB Connect
	$conn = mysqli_connect("localhost","root","");
	if (!$conn) {
		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้";
		exit;
	}
	mysqli_select_db($conn, "study_exam");
	mysqli_query($conn, "SET NAMES utf8");
	date_default_timezone_set('Asia/Bangkok');

?>
