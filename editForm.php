<?php   
require("dbconnect.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM employees WHERE id = $id";
    $result = mysqli_query($connect,$sql);

    $row = mysqli_fetch_assoc($result);
    $skill_arr = array("java","php","python","html","flutter"); //เตรียมตัวเลือก

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>แก้ไขข้อมููลพนักงาน</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
    <div class="container my-3">
    <h2 class="text-center">แบบฟอร์มบันทึกข้อมูล</h2>
        <form action="updateData.php" method="POST">

            <input type="hidden" value="<?php echo $row["id"];?>" name="id">

            <div class="form-group">
                <label for="firstname">ชื่อ</label>
                <input type="text" name="fname" id="" class="form-control" value="<?php echo $row["fname"] ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="lastname">นามสกุล</label>
                <input type="text" name="lname" id="" class="form-control" value="<?php echo $row["lname"] ?> ">
            </div><br>
            <div class="form-group">
                <label for="gender">เพศ</label>
                <?php
                    if($row["gender"] == "male"){
                        echo  "<input type='radio' name='gender' value='male' checked>ชาย";
                        echo  "<input type='radio' name='gender' value='female' >หญิง";
                        echo  "<input type='radio' name='gender' value='other'>อืน ๆ";
                    }else if($row["gender"] == "female"){
                        echo  "<input type='radio' name='gender' value='male' >ชาย";
                        echo  "<input type='radio' name='gender' value='female'checked >หญิง";
                        echo  "<input type='radio' name='gender' value='other'>อืน ๆ";
                    }else{
                        echo  "<input type='radio' name='gender' value='male' >ชาย";
                        echo  "<input type='radio' name='gender' value='female' >หญิง";
                        echo  "<input type='radio' name='gender' value='other' checked>อืน ๆ";
                    } 
                ?>
            </div><br>

            <div class="form-group">
                <label>ทักษะ</label>
                <?php
                    $skill = explode(",",$row["skill"]); //ค่าที่พนักงานกรอกไว้แล้ว
                    foreach($skill_arr as $value){
                        if(in_array($value,$skill)){
                            echo  "<input type='checkbox' name='skill[]' value='$value' checked> $value";
                        }else{
                            echo  "<input type='checkbox' name='skill[]' value='$value' > $value";
                        }
                    }
                ?>

            </div><br>
            <input type="submit" value="อัปเดตข้อมูล" class="btn btn-success"> 
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            
            <a href="index.php" class="btn btn-warning">กลับสู่หน้าแรก</a>
        </form>
       
    </div>
       
    </body>
    </html>