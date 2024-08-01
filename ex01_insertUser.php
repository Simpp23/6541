<?php
include('header.php');
include('footer.php');
include('condb.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="container">
        <h1>Insert User</h1>




        <?php


        $fname = "Tony";
        $lname = "Stark";
        $email = "Tony.Stark@gmail.com";
        $password = "4444";
        $role = "1";
        $sql = "INSERT INTO tb_users (fname, iname, email, password, role) VALUES ('$fname', '$lname', '$email', '$password', '$role')";
        $result = $conn->exec($sql);
        if ($result !== false) {

            echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล";
        }
        ?>
        <hr>
        <a href="index.php">กลับมาได้รึป่าว</a>
    </div>
</body>

</html>