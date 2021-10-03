<?php 
require("dbconnect.php");

    $id_arr = $_POST["idcheckbox"];

    $multiple_id=implode(",",$id_arr);

    $sql = "DELETE FROM employees WHERE id in ($multiple_id)";

    $result = mysqli_query($connect,$sql);
 

    if($result){
        // echo "ลบข้อมูลเรียบร้อย <br>";
        // echo "<a href='index.php'>กลับสู่หน้าแรก</a>";
        header("location:index.php");
        exit(0);
    }else{
        echo "ไม่สามารถลบข้อมูลได้";
    }



?>