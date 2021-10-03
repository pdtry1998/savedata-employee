<?php
    require("dbconnect.php");

    $sql = "SELECT * FROM employees";
    $result = mysqli_query($connect,$sql);

    // $row = mysqli_fetch_array($result,MYSQLI_NUM);
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $row = mysqli_fetch_array($result,MYSQLI_BOTH);

    // print_r($row);

    echo "รหัสพนักงาน".$row[0]."<br>";
    echo "ชื่อ".$row["fname"]."<br>";
    echo "นามสกุล".$row[2]."<br>";
    echo "เพศ".$row[3]."<br>";
    echo "ทักษะ".$row[4]."<br>";
    echo "<hr>";
?>