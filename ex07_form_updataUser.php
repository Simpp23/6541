<?php
include('header.php');
include('footer.php');

include 'condb.php';

$id = $_POST['user_id'];
$sql = "SELECT * FROM tb_users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->execute();
$users = $stmt->fetch(PDO::FETCH_ASSOC);

$id = $users['id'];
$fname = $users['fname'];
$iname = $users['iname'];
$email = $users['email'];
$password = $users['password'];
$role = $users['role'];

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
        <h3 class="mt-4">ฟอร์มแก้ไขข้อมูล</h3>
        <hr>
        <form action="ex07_script_insertUser.php" method="post">

            <div class="mb-3">
                <!-- <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="id"
                    value=" "> -->
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            </div>
        
            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="fname" id="firstname" aria-describedby="firstname"
                    value="<?php echo $fname; ?>">
            </div>
            <div class="mb-3">
                <label for="iastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="iname" id="iastnam" aria-describedby="iastname"
                    value="<?php echo $iname; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="email"
                    value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="password"
                    value="<?php echo $password; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Role : </label>
                <input type="radio" class="form-check-input" <?php echo $role == 1 ? 'checked' : '' ?> name="role"
                    id="role1" value="1">
                <label for="role1" class="form-label">admin</label>
                <input type="radio" class="form-check-input" name="role" <?php echo $role == 0 ? 'checked' : '' ?>
                    id="role2" value="0">
                <label for="role2" class="form-label">user</label>
            </div>
            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        </form>
        <hr>
        <p class="text-end">
            <a href="index.php">กลับมาหาฉัน สักทีได้มั้ย</a>
        </p>
    </div>
</body>

</html>