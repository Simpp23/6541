<?php

require_once '../condb.php';

// include('header.php');
// include('footer.php');

// include '';

$id = $_POST['user_id'];
$sql = "SELECT persons.*, tb_users.* FROM persons
LEFT JOIN tb_users ON persons.id = tb_users.person_id WHERE
tb_users.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->execute();
$users = $stmt->fetch(PDO::FETCH_ASSOC);

$id = $users['id'];
$fname = $users['fname'];
$iname = $users['iname'];
$email = $users['email'];
$dob = $users['dob'];
$avater = $users['avater'];
$password = $users['password'];
$role = $users['role'];

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>แก้ไขสมาชิก</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Text Editors</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">

                    <!-- /.card-header -->
                    <div class="card-body">



                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="update_member_dt_script.php" method="post">
                            <div class="mb-3">
                                <!-- <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="id"
                    value=" "> -->
                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" aria-describedby="email"
                                    value="<?php echo $email; ?> readonly">
                            </div>

                            <div class="mb-3">
                                <label for="firstname" class="form-label">First name</label>
                                <input type="text" class="form-control" name="fname" id="firstname"
                                    aria-describedby="firstname" value="<?php echo $fname; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="iastname" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="iname" id="iastnam"
                                    aria-describedby="iastname" value="<?php echo $iname; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob"
                                    aria-describedby="dob" value="<?php echo $dob; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Photo</label>
                                <input type="file" class="form-control" name="avatar" id="avatar"
                                    aria-describedby="avatar" value="<?php echo $avatar; ?>">
                            </div>
                           

                            <div class="mb-3">
                                <label for="" class="form-label">Role : </label>
                                <span class="form-check">
                                    <input type="radio" class="form-check-input" name="role" id="role1" value="1" <?php echo ($role == 1) ? 'checked' : ''; ?>>
                                    <label for="role1" class="form-label">admin</label>
                                </span>
                                <span class="form-check">
                                    <input type="radio" class="form-check-input" name="role" id="role2" value="0" <?php echo ($role == 0) ? 'checked' : ''; ?>>
                                    <label for="role2" class="form-label">user</label>
                                </span>
                            </div>




                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.col-->
</div>
<!-- ./row -->

<!-- ./row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->