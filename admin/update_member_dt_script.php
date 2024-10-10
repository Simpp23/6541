<?php
include('../condb.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>

</head>

<body>
    <div class="container">

        <?php


        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['iname'];
        // $email = $_POST['email'];
        $role = $_POST['role'];
        $dob = $_POST['dob'];
        $avater = $_POST['avatar'];
       


        try {


            // เริ่มการทำธุรกรรม (Transaction) เพื่อให้แน่ใจว่าข้อมูลถูกบันทึกลงทั้งสองตาราง หรือไม่บันทึกเลย
            $conn->beginTransaction();

            // คำสั่ง SQL สำหรับบันทึก fname และ lname ลงตาราง persons
            $sql1 = "UPDATE persons SET fname = ?, lname = ?, dob = ?, avater = ? WHERE id = ?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bindParam(1, $fname);
            $stmt1->bindParam(2, $lname);
            $stmt1->bindParam(3, $dob);
            $stmt1->bindParam(4, $avater);
            $stmt1->bindParam(5, $id);
            $stmt1->execute();
          
            // คำสั่ง SQL ส าหรับบันทึก email, password และ role ลงตาราง tb_users
            $sql2 = "UPDATE tb_users SET email = ?, role=? WHERE id = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(1, $email);
            $stmt2->bindParam(2, $role);
            $stmt2->bindParam(3, $id);
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
            title: "แก้ไขข้อมูลสําเร็จ",
            showConfirmButton: false,
             timer: 1500
            }).then(function() {
            window.location = "show_member.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
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
            window.location = "update_member.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
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