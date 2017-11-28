<?php
include "conn.php";
if (isset($_GET["edit_id"])) {
	$edit_id = $_GET["edit_id"];
	
	$sql = "SELECT * FROM bio WHERE bio_id = '$edit_id'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		$bio_id = $row["bio_id"];
        $bio_middle = $row["bio_middle"];
        $fname = $row["fname"];
        $lname = $row["lname"];
        $gender = $row["gender"];
        $byear = $row["byear"];
        $addr = $row["addr"];
        $bio_edu = $row["bio_edu"];

	}
}
if (isset($_POST["btnEdit"])) {
	$bio_id = $_POST["bio_id"];
	$bio_middle = $_POST["bio_middle"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$gender = $_POST["gender"];
	$byear = $_POST["byear"];
	$addr = $_POST["addr"];
	$bio_edu = $_POST["bio_edu"];

	$sql = "UPDATE bio SET
			bio_middle = '$bio_middle',
			fname = '$fname',
			lname = '$lname',
			gender = '$gender',
			byear = '$byear',
			addr = '$addr',
			bio_edu = '$bio_edu'
			WHERE bio_id = '$bio_id'";

			if ($result = mysqli_query($conn, $sql)) {
				echo "<script type='text/javascript'>";
				echo "alert('แก้ไขสำเร็จ');";
				echo "window.location='index.php';";
				echo "window.close();";
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
	<h1>แก้ไขข้อมูล [<?php echo $fname . " " . $lname; ?>]</h1>
	<form action="edit.php" method="post">
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
					<option value="<?php echo $middle_id; ?>" <?php if ($middle_id == $bio_middle) {
                                                    echo "selected";
                                                } ?>><?php echo $middle_name; ?> </option>
					<?php
				}
				?>
			</select></td>
			</tr>
			<tr>
			<td>ชื่อ</td>
			<td><input type="text" name="fname" value="<?php echo $fname; ?>"></td>
			</tr>
			<tr>
			<td>นามสกุล</td>
			<td><input type="text" name="lname" value="<?php echo $lname; ?>"></td>
		</tr><br>
		<tr>
			<td>เพศ</td>
			<td><input type="radio" name="gender" value="1" <?php if ($gender == "1") {
				echo "checked";
			} ?>>ชาย <input type="radio" name="gender" value="2" <?php if ($gender == "2") {
				echo "checked";
			} ?>>หญิง</td>
		</tr>
		<tr>
			<td>ปี ค.ศ. เกิด</td>
			<td><input type="text" name="byear" maxlength="4" value="<?php echo $byear; ?>"></td>
		</tr>
		<tr>
			<td>ที่อยู่</td>
			<td><textarea name="addr" id="" cols="30" rows="10"><?php echo $addr; ?></textarea></td>
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
					<option value="<?php echo $edu_id; ?>" <?php if ($edu_id == $bio_edu) {
						echo "selected";
					} ?>> <?php echo $edu_name; ?> </option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<input type="hidden" name="bio_id" value="<?php echo $bio_id; ?>">
			<td><input type="submit" name="btnEdit" value="แก้ไขข้อมูล"></td>
			<td><input type="button"value="กลับหน้าหลัก" onclick="window.location.href='index.php'"></td>
		</tr>
		
		
		
		</table>
	
	</fieldset>
	
	</form>
</body>
</html>