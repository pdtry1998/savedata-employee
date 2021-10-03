<?php
    require("dbconnect.php");
    $sql = "SELECT * FROM employees ORDER BY fname ASC ";
    $result = mysqli_query($connect,$sql);

    $count = mysqli_num_rows($result);

    $order =1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
   <div class="container">
   <h1 class="text-center">ข้อมูลพนักงานในฐานข้อมูล</h1><hr>
    <?php if($count>0){ ?>

    <form action="searchData.php"  method="POST">
        <label class="my-2">ค้นหาพนักงาน</label>
        <input type="text" placeholder="ป้อนชื่อพนักงานเพื่อค้นหา" class="form-control" name="empname">
        <input type="submit" value="Search" class="btn btn-dark my-2">
   </form>
    
    <table class="table table-bordered">
        <thead >
            <tr >
                <th>ลำดับที่</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>

                <th>เพศ</th>
                <th>ทักษะความสามารถ</th>
                <th>แก้ไขข้อมูล</th>
                <th>ลบข้อมูล</th>
                <th>ลบข้อมูล(checkbox)</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $order++?></td>
                <td><?php echo $row["fname"]?></td>
                <td><?php echo $row["lname"]?></td>
                <td>
                    <?php if($row["gender"]=="male"){ ?>
                        ชาย
                    <?php } else if($row["gender"]=="female"){ ?>
                        หญิง
                    <?php } else { ?>
                        อื่น ๆ
                    <?php }  ?>
                
                </td>
                <td><?php echo $row["skill"]?></td>
                <td>
                        <a href="editForm.php?id=<?php echo $row["id"];?>" class="btn btn-info">แก้ไข</a>
                </td>
                <td>
                    <a href="deleteQueryString.php?idemployee=<?php echo $row["id"];?>" class="btn btn-danger"
                    onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"
                    >ลบข้อมูล</a>
                </td>

                <form action="multipleDelete.php" method="post">
                <td>
                    <input type="checkbox" name="idcheckbox[]" value="<?php echo $row["id"];?>" >
                 </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php }else {?>
        <div class="alert alert-danger">
           <b>ไม่มีข้อมูลพนักงาน !!!</b>
        </div>
    <?php };?>

    <a href="insertform.php" class="btn btn-success">บันทึกข้อมูลพนักงาน</a>

    <?php if($count>0){ ?>
    <input type="submit" value="ลบข้อมูล (Checkbox)" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือกหรือไม่')">
    <?php } ?>
    
    </form>

    <?php if($count>0){ ?>
    <button class="btn btn-primary" onclick="checkAll()">เลือกทั้งหมด</button>
    <button class="btn btn-warning" onclick="uncheckAll()">ยกเลิก</button>
    <?php } ?>

</div>

   <script>
       function checkAll() {
           var form_element = document.forms[1].length
           for(i=0;i<form_element-1;i++){
                document.forms[1].elements[i].checked=true;
           }
       }
       function uncheckAll() {
           var form_element = document.forms[1].length
           for(i=0;i<form_element-1;i++){
                document.forms[1].elements[i].checked=false;
           }
       }
   </script>
</body>
</html>