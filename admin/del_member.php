<?php
include('../condb.php');


//ลบข้อมูล- ลบจริงๆ
if (isset($_POST['user_id'])) {

    $u_id = $_POST['user_id'];

    try {

        $conn->beginTransaction(); // เริ่มต้น Transaction
// ดึงค่า person_id ก่อนที่จะลบข้อมูลจาก tb_users
        $sql_get_person_id = "SELECT person_id FROM tb_users WHERE id = ?";
        $stmt_get_person_id = $conn->prepare($sql_get_person_id);
        $stmt_get_person_id->bindParam(1, $u_id);
        $stmt_get_person_id->execute();
        $person_id = $stmt_get_person_id->fetchColumn();

        // ลบข้อมูลจาก tb_users
        $sql1 = "DELETE FROM tb_users WHERE id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(1, $u_id);
        $result1 = $stmt1->execute();
        // ลบข้อมูลจาก persons โดยใช้ person_id ที่ได้จากข้นั ตอนกอ่ นหน้า
        if ($person_id) { // ตรวจสอบว่ามี person_id ที่ถูกต้อง
            $sql2 = "DELETE FROM persons WHERE id = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(1, $person_id);
            $result2 = $stmt2->execute();
        }
        $conn->commit(); // Commit การเปลี่ยนแปลง
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        if ($result1 && $result2) {
            echo '<script>
                        setTimeout(function() {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "ลบข้อมูลสําเร็จ",
                                showConfirmButton: true,
                                // timer: 1500
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
                        showConfirmButton: true,
                        // timer: 1500
                        }).then(function() {
                    window.location = "show_member.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
                        });
                    }, 1000);
                </script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>