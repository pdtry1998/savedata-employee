<?php
    // เชื่อมต่อกับฐานข้อมูล
    require("dbconnect.php");
   
    // รับค่าที่ส่งมาจากฟอร์มลงในตัวแปร
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $skill = implode(",",$_POST["skill"]); // array to string

 


   

    //บันทึกข้อมูล
    $sql = "INSERT INTO employees(fname,lname,gender,skill) VALUES('$fname','$lname','$gender','$skill')";

    $result = mysqli_query($connect,$sql); // สั่งรันคำสั่ง sql 

    if($result){
        header("location:index.php");
        exit(0);
    }else{
        echo mysqli_error($connect);
    }


?>