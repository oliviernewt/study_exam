<?php 
include "conn.php";
if (isset($_POST["btnAdd"])) {
	$edu = $_POST["edu"];

	$sql = "INSERT INTO `edu`(`edu_name`) VALUES ('$edu')";
	$result = mysqli_query($conn, $sql);
	if($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสำเร็จ');";
        echo "window.location='edu.php';";
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
	<h1>หน้าแบบฟอร์ม[ระดับการศึกษา]</h1>
	<button onclick="window.location.href='insert.php'">กลับหน้า INSERT</button>
	<form action="edu.php" method="post">
		<fieldset>
        ระดับการศึกษา
<input type="text" name="edu" value="">
<input type="submit" name="btnAdd" value="เพิ่มข้อมูล">


	</fieldset>

	</form>
    <br>
    <table>
    <tr>
    <th>คำนำหน้า</th>
	</tr>
	<?php 
	$sql = "SELECT * FROM edu";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$edu_id = $row["edu_id"];
		$edu_name = $row["edu_name"];

		echo "
		<tr>
		<td>$edu_name</td>
		</tr>
		";
	}
	?>

    </table>
</body>
</html>
