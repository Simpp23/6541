<?php
include('condb.php');


//ลบข้อมูล- ลบจริงๆ
if (isset($_POST['user_id'])) {

    $u_id = $_POST['user_id'];

    try {

        $sql = "DELETE FROM tb_users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $u_id);
        $result = $stmt->execute();
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        if ($result) {
            echo '<script>
                        setTimeout(function() {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "ลบข้อมูลสําเร็จ",
                                showConfirmButton: true,
                                // timer: 1500
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
                        showConfirmButton: true,
                        // timer: 1500
                        }).then(function() {
                    window.location = "ex05_showUser.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
                        });
                    }, 1000);
                </script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>