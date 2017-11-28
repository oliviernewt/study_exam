<?php 
include "conn.php";
if (isset($_POST["btnAdd"])) {
	$middle = $_POST["middle"];

	$sql = "INSERT INTO `middle`(`middle_name`) VALUES ('$middle')";
	$result = mysqli_query($conn, $sql);
	if($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสำเร็จ');";
        echo "window.location='middle.php';";
        echo "</script>";
    }else {
      echo "<script type='text/javascript'>";
      echo "alert('พบข้อผิดพลาด');";
      echo "</script>";
    }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Study Exam</title>
</head>

<body>
	<h1>หน้าแบบฟอร์ม[คำนำหน้า]</h1>
	<button onclick="window.location.href='insert.php'">กลับหน้า INSERT</button>
	<form action="middle.php" method="post">
		<fieldset>
คำนำหน้า
<input type="text" name="middle" value="">
<input type="submit" name="btnAdd" value="เพิ่มข้อมูล">


	</fieldset>

	</form>
    <br>
    <table>
    <tr>
    <th>คำนำหน้า</th>
	</tr>
	<?php 
	$sql = "SELECT * FROM middle";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$middle_id = $row["middle_id"];
		$middle_name = $row["middle_name"];

		echo "
		<tr>
		<td>$middle_name</td>
		</tr>
		";
	}
	?>

    </table>
</body>
</html>
