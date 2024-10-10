<?php
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

        <?php


        $fname = $_POST['fname'];
        $lname = $_POST['iname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        try {


            // เริ่มการทำธุรกรรม (Transaction) เพื่อให้แน่ใจว่าข้อมูลถูกบันทึกลงทั้งสองตาราง หรือไม่บันทึกเลย
            $conn->beginTransaction();

            // คำสั่ง SQL สำหรับบันทึก fname และ lname ลงตาราง persons
            $sql1 = "INSERT INTO persons (fname, iname) VALUES (?, ?)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bindParam(1, $fname);
            $stmt1->bindParam(2, $lname);
            $stmt1->execute();
            // รับค่า person_id ของแถวที่เพิ่งถูกเพิ่มใน persons
            $person_id = $conn->lastInsertId();
            // คำสั่ง SQL ส าหรับบันทึก email, password และ role ลงตาราง tb_users
            $sql2 = "INSERT INTO tb_users (person_id, email, password) VALUES (?, ?, ?)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(1, $person_id);
            $stmt2->bindParam(2, $email);
            $stmt2->bindParam(3, $passwordHash);
            $stmt2->execute();
            // ถ้าทุกอย่างทำงานเรียบร้อย ทำการ Commit เพื่อยืนยันการบันทึกข้อมูล
            $conn->commit();
            $result = "success"; // กำหนดค่า result เป็น success เมื่อส าเร็จ
        } catch (Exception $e) {
            $conn->rollBack();
            $result = "error"; // กำหนดค่า result เป็น error เมื่อเกิดข้อผิดพลาด
        }

        //sweet alert
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        if ($result === "success") {
            echo '<script>
            setTimeout(function() {
            Swal.fire({
            position: "center",
            icon: "success",
            title: "เพิ่มข้อมูลสําเร็จ",
            showConfirmButton: false,
             timer: 1500
            }).then(function() {
            window.location = "login.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
            });
            }, 1000);
            </script>';
        } elseif ($result === "email_exists") {
            echo '<script>                  
            setTimeout(function() {                      
            Swal.fire({                          
            position: "center",                          
            icon: "error",                          
            title: "อเมลนถกใชงานแลว",                          
            showConfirmButton: false,                          
            timer: 1500                      
            }).then(function() {                          
            window.location = "register.php"; // Redirect to.. ปรับแก้ชื่อ ไฟล์ตามที่ต้องการให้ไป                      
            });                  
            }, 10);                    
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
            window.location = "register.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
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