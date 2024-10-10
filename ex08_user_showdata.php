<?php
require_once 'condb.php';
$sql = "SELECT * FROM tb_users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<head>
    <title>View Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <h1>USER Page</h1>
        <div>
            <a href="ex04_from_insertUser.php" class="btn btn=primary">Add User</a>
        </div>
        <table class=" table" id="something">
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $us):
                    if ($us['role'] == 1) {
                        $role = 'Admin';
                    } else {
                        $role = 'User';
                    }
                    ?>
                    <tr>
                        <td><?php echo $us['id']; ?></td>
                        <td><?php echo $us['fname']; ?></td>
                        <td><?php echo $us['iname']; ?></td>
                        <td><?php echo $us['email']; ?></td>
                        <td><?php echo $us['password']; ?></td>
                        <td><?php echo $role ?></td>
                        <td>
                            <form action="ex07_form_updataUser.php" method="POST" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $us['id']; ?>">
                                <input type="submit" name="edit" value="Edit" class="btn btn-warning btn-sm">
                            </form>

                            <form action="ex06_deleteSweet.php" method="POST" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $us['id']; ?>">
                                <!-- <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm"> -->
                                <button type="button" class="btn btn-danger btn-sm delete-button"
                                    data-user-id="<?php echo $us['id']; ?>">Delete</button>
                            </form>


                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <a href="index.php">ย้อนกลับไปหน้าหลัก</a>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="http://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#something').DataTable();
    });
</script>

<script>
    // ฟังก์ชันสาหรับแสดงกล่องยืนยัน ํ SweetAlert2
    function showDeleteConfirmation(userId) {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: 'คุณจะไม่สามารถเรียกคืนข ้อมูลกลับได ้!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ลบ',
            cancelButtonText: 'ยกเลิก',
        }).then((result) => {
            if (result.isConfirmed) {
                // หากผู้ใชยืนยัน ให ้ส ้ งค่าฟอร์มไปยัง ่ delete.php เพื่อลบข ้อมูล
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'ex06_deleteSweet.php';
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'user_id';
                input.value = userId;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
    // แนบตัวตรวจจับเหตุการณ์คลิกกับองค์ปุ่ มลบทั้งหมดที่มีคลาส delete-button
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const userId = button.getAttribute('data-user-id');
            showDeleteConfirmation(userId);
        });
    });
</script>

</html>