<?php
include('../condb.php');

echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

?>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['iname'];
        $email = $_POST['email'];
        
        $dob = $_POST['dob'];
        $club_id = $_POST['club']; // รับค่าของ club_id จากฟอร์ม
       
            // ดึงข้อมูลผู้ใช้จากฐานข้อมูลเพื่อตรวจสอบรูปภาพเดิม
            $sql = "SELECT avatar FROM persons WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $person = $stmt->fetch(PDO::FETCH_ASSOC);
            $oldAvatar = $person['avatar'];
            // ตรวจสอบวา่ ไดม้ีการอปัโหลดรูปภาพใหม่หรือไม่
            if (!empty($_FILES['avatar']['name'])) { // ถา้มีการอปัโหลดรูปภาพใหม่
            $targetDir = realpath(__DIR__ . "/../assets/dist/avatar/") . "/"; 
            $fileName = basename($_FILES['avatar']['name']); // เอาเฉพาะชื่อไฟลอ์อกมา (ไม่เอา path)
          
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); // เอาเฉพาะนามสกุลไฟล์
            $newFileName = uniqid() . '_' . time() . '.' . $fileType;
            $targetFilePath = $targetDir . $newFileName;
        
            // แสดงค่าจาก $_FILES เพื่อตรวจสอบการอัปโหลด
            // ตรวจสอบประเภทไฟล์(สามารถเพิ่มประเภทที่ตอ้งการได)้
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif'); // ประเภทไฟล์ที่อนุญาต
            if (in_array($fileType, $allowTypes)) { // ตรวจสอบวา่ อยใู่ นประเภทที่อนุญาตหรือไม่
            // ตรวจสอบวา่ มีขอ้ผดิพลาดในการอปัโหลดไฟลห์ รือไม่
            if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) { // ถา้ไม่มีขอ้ผดิพลาด
            // อัปโหลดไฟล์ไปยังโฟลเดอร์ที่ต้องการ
            if (move_uploaded_file($_FILES['avatar']['tmp_name'],
            $targetFilePath)) { // ถ้าอัปโหลดส าเร็จ
                            // ลบรูปภาพเก่า (ถา้มี) เพื่อประหยดัพ้ืนที่
                            if (!empty($oldAvatar) && file_exists($targetDir .
                                $oldAvatar)) { // ถา้มีรูปภาพเดิมและมีไฟลอ์ยจู่ ริง
                                unlink($targetDir . $oldAvatar); // ลบไฟลเ์ดิม (รูปภาพเก่า)ออก
                            }
                            // เกบ็ ชื่อไฟลร์ูปภาพใหม่
                            $avatar = $newFileName;

            } else {
                            echo '<script>
                    setTimeout(function() {
                    Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "เกิดข้อผิดพลาดในการย้ายไฟล์ไปยังไฟลเดอร์เป้าหมาย",
                    showConfirmButton: false,
                    timer: 1500
                    }).then(function() {
                    window.location = "update_profile.php";
                    });
                    }, 1000);
                    </script>';
            exit();
            }
            } else {
                        echo '<script>
                    setTimeout(function() {
                    Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "เกิดข้อผิดพลาดในการอัปโหลดไฟล์",
                    showConfirmButton: false,
                    timer: 1500
                    }).then(function() {
                    window.location = "update_profile.php";
                    });
                    }, 1000);
                    </script>';
            exit();
            }
            } else {
                    echo '<script>
                    setTimeout(function() {
                    Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "ประเภทไฟล์ไม่รองรับ",
                    showConfirmButton: false,
                    timer: 1500
                    }).then(function() {
                    window.location = "update_profile.php";
                    });
                    }, 1000);
                    </script>';
            exit();
            }
            } else {
            // ถา้ไม่มีการอปัโหลดใหม่ใหใ้ชรู้ปภาพเดิม
            $avatar = $oldAvatar;
            }


        try {

            // คำสั่ง SQL สำหรับบันทึก fname และ lname ลงตาราง persons
            $sql1 = "UPDATE persons SET fname = ?, iname = ?, dob = ?, avatar = ?, club_id = ? WHERE id = ?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bindParam(1, $fname);
            $stmt1->bindParam(2, $lname);
            $stmt1->bindParam(3, $dob);
            $stmt1->bindParam(4, $avatar);
            $stmt1->bindParam(5, $club_id);
            $stmt1->bindParam(6, $id);
            $stmt1->execute();


                // ถ้าอัปเดตส าเร็จ
                echo '<script>
                    setTimeout(function() {
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "แก้ไขข้อมูลสำเร็จ",
                    showConfirmButton: false,
                    timer: 1500
                    }).then(function() {
                    window.location = "update_profile.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                    </script>';
                exit();
    
            } catch (Exception $e) {
            echo "เกิดข้อผิดพลาด: " . $e->getMessage();
            }

       
        }
    

        ?>
        <!-- <hr>
        <a href="index.php">กลับมาได้รึป่าว</a>
    </div> -->