<?php
include "conn.php";

if (isset($_GET["view_id"])) {
    $view_id = $_GET["view_id"];

    $sql = "SELECT * FROM bio 
    LEFT JOIN middle
    ON bio.bio_middle = middle.middle_id
    LEFT JOIN edu
    ON bio.bio_edu = edu.edu_id
    WHERE bio_id = '$view_id'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $bio_id = $row["bio_id"];
        $bio_middle = $row["bio_middle"];
        $fname = $row["fname"];
        $lname = $row["lname"];
        $gender = $row["gender"];
        $byear = $row["byear"];
        $addr = $row["addr"];
        $bio_edu = $row["bio_edu"];
        $middle_name = $row["middle_name"];
        $edu_name = $row["edu_name"];

        $show_gender = array("1"=> "ชาย","2"=> "หญิง");
        $nowyear = date('Y');
        $yearold = $nowyear - $byear;
    }
    

}
}
if (isset($_GET["del_id"])) {
    $del_id = $_GET["del_id"];
    $sql = "DELETE FROM bio WHERE bio_id = '$del_id'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูลเรียบร้อย');";
        echo "window.location='index.php';";
        echo "</script>";
    }else {
        echo "<script type='text/javascript'>";
        echo "alert('พบข้อผิดพลาด');";
        echo "</script>";
      }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Study Exam</title>
  </head>
  <body>
    <h1>แสดงข้อมูล[<?php echo $fname . " " . $lname; ?>]</h1>
    <button onclick="window.location.href='edit.php?edit_id=<?php echo $bio_id; ?>'">แก้ไข</button>
    <button onclick="if (confirm('ยืนยันการลบ?')) window.location.href='view.php?del_id=<?php echo $bio_id; ?>';">ลบข้อมูล</button>
    

<fieldset>
    <table>
        <tr>
            <td><b>คำนำหน้า : </b></td>
            <td><?php echo $middle_name; ?></td>
        </tr>
        <tr>
            <td><b>ชื่อ : </b></td>
            <td><?php echo $fname; ?></td>
        </tr>
        <tr>
            <td><b>นามสกุล : </b></td>
            <td><?php echo $lname; ?></td>
        </tr>
        <tr>
            <td><b>เพศ : </b></td>
            <td><?php echo $show_gender[$gender]; ?></td>
        </tr>
        <tr> 
            <td><b>เกิดปี ค.ศ. : </b></td>
            <td><?php echo $byear; ?></td>
        </tr>
        <tr>
            <td><b>ปัจจุบัน อายุ : </b></td>
            <td><?php echo $yearold . " " . "<b>ปี</b>"; ?></td>
        </tr>
        <tr>
            <td><b>ที่อยู่ : </b></td>
            <td><?php echo $addr; ?></td>
        </tr>
        <tr>
            <td><b>ระดับการศึกษา : </b></td>
            <td><?php echo $edu_name; ?></td>
        </tr>
    </table>
    
</fieldset>
<button onclick="window.location.href='index.php'">กลับสู่หน้าหลัก</button>
  </body>
</html>
