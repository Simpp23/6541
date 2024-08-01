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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Student Records</h1>
        <table class="table" id="something">
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
                <?php foreach ($users as $us) :
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
                            <input type="submit" name="delete" value="Edit" class="button btn-warning">
                            <input type="submit" name="delete" value="Delete " class="button btn-danger">
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
    $(document).ready(function() {
        $('#something').DataTable();
    });
</script>

</html>