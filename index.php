<?php
include "conn.php";

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Study Exam</title>
  </head>

  <body>
    <h1>แสดงข้อมูล</h1>
    <button onclick="window.location.href='insert.php'">เพิ่มข้อมูล</button>
    <br>
    <fieldset>
      <table>
        <tr>
          <th>ลำดับที่</th>
          <th>คำนำหน้า</th>
          <th>ชื่อ-สกุล</th>
          <th>ระดับการศึกษา</th>
          <th>จัดการ</th>
        </tr>
        <?php 
$sql = "SELECT * FROM bio 
        LEFT JOIN middle
        ON bio.bio_middle = middle.middle_id
        LEFT JOIN edu
        ON bio.bio_edu = edu.edu_id
        ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
  $bio_id = $row["bio_id"];
  $bio_middle = $row["bio_middle"];
  $fname = $row["fname"];
  $lname = $row["lname"];
  $bio_edu = $row["bio_edu"];
  $middle_name = $row["middle_name"];
  $edu_name = $row["edu_name"];

  echo "
  <tr>
    <td>$bio_id</td>
    <td>$middle_name</td>
    <td>$fname $lname</td>
    <td>$edu_name</td>
    <td><a href='view.php?view_id=$bio_id'>ดูข้อมูลทั้งหมด</a></td>
  </tr>
  ";
}
?>
      </table>
    </fieldset>

  </body>

  </html>