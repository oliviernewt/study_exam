<?php
include "conn.php";
if (isset($_POST["btnAdd"])) {
	$bio_middle = $_POST["bio_middle"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$gender = $_POST["gender"];
	$byear = $_POST["byear"];
	$addr = $_POST["addr"];
	$bio_edu = $_POST["bio_edu"];

	$sql = "INSERT INTO `bio`(`bio_middle`, `fname`, `lname`, `gender`, `byear`, `addr`, `bio_edu`) VALUES ('$bio_middle', '$fname', '$lname', '$gender', '$byear', '$addr', '$bio_edu')";
	$result = mysqli_query($conn, $sql);
	if($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสำเร็จ');";
        echo "window.location='index.php';";
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
<title>Study Exam</title>
</head>

<body>
	<a href="index.php"><h1>หน้าแบบฟอร์ม</h1></a>
	<button onclick="window.location.href='middle.php'">เพิ่มคำนำหน้า</button><button onclick="window.location.href='edu.php'">เพิ่มระดับการศึกษา</button>
	<form action="insert.php" method="post">
		<fieldset>
	<table>
		<tr>
			<td>คำนำหน้าชื่อ </td>
		<td><select name="bio_middle">
			<option>--โปรดเลือกคำนำหน้า--</option>
			<?php
				$sql = "SELECT * FROM middle ORDER BY middle_id ASC";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($result)) {
					$middle_id = $row["middle_id"];
					$middle_name = $row["middle_name"];
					?>
					<option value="<?php echo $middle_id; ?>"> <?php echo $middle_name; ?> </option>
					<?php
				}
				?>
			</select></td>
			</tr>
			<tr>
			<td>ชื่อ</td>
			<td><input type="text" name="fname" value=""></td>
			</tr>
			<tr>
			<td>นามสกุล</td>
			<td><input type="text" name="lname" value=""></td>
		</tr><br>
		<tr>
			<td>เพศ</td>
			<td><input type="radio" name="gender" value="1">ชาย <input type="radio" name="gender" value="2">หญิง</td>
		</tr>
		<tr>
			<td>ปี ค.ศ. เกิด</td>
			<td><input type="text" name="byear" maxlength="4" value=""></td>
		</tr>
		<tr>
			<td>ที่อยู่</td>
			<td><textarea name="addr" id="" cols="30" rows="10"></textarea></td>
		</tr>
		<tr>
			<td>ระดับการศึกษา</td>
			<td>
				<select name="bio_edu">
					<option value="">--โปรดเลือกระดับการศึกษา--</option>
					<?php
				$sql = "SELECT * FROM edu ORDER BY edu_id ASC";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($result)) {
					$edu_id = $row["edu_id"];
					$edu_name = $row["edu_name"];
					?>
					<option value="<?php echo $edu_id; ?>"> <?php echo $edu_name; ?> </option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="btnAdd" value="เพิ่มข้อมูล"></td>
		</tr>
		
		
		
		</table>
	
	</fieldset>
	
	</form>
</body>
</html>