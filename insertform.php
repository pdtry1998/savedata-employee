<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container my-3">
<h2 class="text-center">แบบฟอร์มบันทึกข้อมูล</h2>
    <form action="insertdata.php" method="POST">
        <div class="form-group">
            <label for="firstname">ชื่อ</label>
            <input type="text" name="fname" id="" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="lastname">นามสกุล</label>
            <input type="text" name="lname" id="" class="form-control">
        </div><br>
        <div class="form-group">
            <label for="gender">เพศ</label>
            <input type="radio" name="gender" value="male">ชาย
            <input type="radio" name="gender" value="female">หญิง
            <input type="radio" name="gender" value="other">อื่น ๆ
        </div><br>
        <div class="form-group">
            <label>ทักษะ</label>
            <input type="checkbox" name="skill[]" value="java"> JAVA
            <input type="checkbox" name="skill[]" value="php"> PHP
            <input type="checkbox" name="skill[]" value="python"> Python
            <input type="checkbox" name="skill[]" value="html"> HTML
            <input type="checkbox" name="skill[]" value="flutter"> Flutter
        </div><br>
        <input type="submit" value="บันทึกข้อมูล" class="btn btn-success"> 
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
        
        <a href="index.php" class="btn btn-warning">กลับสู่หน้าแรก</a>
    </form>
   
</div>
   
</body>
</html>