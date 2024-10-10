<?php
// include('header.php');
// include('footer.php');
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
        <!-- <h1>Insert User</h1> -->

        <?php

        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['iname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $sql = "UPDATE tb_users SET fname=?, iname=?, email=?, password=?, role=? WHERE id=? ";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $fname);
        $stmt->bindParam(2, $lname);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $password);
        $stmt->bindParam(5, $role);
        $stmt->bindParam(6, $id);

        $result = $stmt->execute();


        // if ($result !== false) {
        
        //     echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
        // } else {
        //     echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล";
        // }
        

        //sweet alert
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        if ($result) {
            echo '<script>
            setTimeout(function() {
            Swal.fire({
            position: "center",
            icon: "success",
            title: "อัพเดตข้อมูลสําเร็จ",
            showConfirmButton: false,
             timer: 1500
            }).then(function() {
            window.location = "ex05_showUser.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
            });
            }, 1000);
            </script>';
        } else {
            echo '<script>
            setTimeout(function() {
            Swal.fire({
            position: "center",
            icon: "error",
            title: "เกิดข้อผิดพลาด",
            showConfirmButton: false,
             timer: 1500
            }).then(function() {
            window.location = "index.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
            });
            }, 1000);
</script>';
        }


        ?>
        <!-- <hr>
        <a href="index.php">กลับมาได้รึป่าว</a>
    </div> -->
</body>

</html>