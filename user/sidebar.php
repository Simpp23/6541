<?php
require_once '../condb.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_login'])) {
  $user_id = $_SESSION['user_login'];
  $sql = "SELECT persons.*, tb_users.* FROM persons
LEFT JOIN tb_users ON persons.id = tb_users.person_id
WHERE persons.id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $user_id);
  $stmt->execute();
  $us = $stmt->fetch(PDO::FETCH_ASSOC);
  extract($us); // ไม่ตอ้งสร้างตวัแปรมารองรับ เรียกใชผ้า่ นชื่อฟิลดไ์ ดเ้ลย
  $imageURL = '../assets/dist/avatar/' . $avatar;
}
// ตรวจสอบวา่ มีการอปัโหลดรูปภาพหรือไม่ถา้ไม่มีให้ใชรู้ปภาพตวัอยา่ งแทน
$imageURL = !empty($avatar) ? $imageURL : '../assets/dist/avatar/user1.jpg';
?>




<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <div style="display: flex; flex-direction: column; align-items: center;">
      <img src="<?php echo $imageURL ?>" style="width: 50%; max-width: 150px; height: auto;" class="img-circle ">
      <!-- <br> -->
      <span class="brand-text font-weight-light"><?php echo $us['fname'] . ' ' . $us['iname']; ?></span>
    </div>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-home" style="color: gold;"></i>
            <p>
              หน้าหลัก
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="update_profile.php" class="nav-link">
            <i class="nav-icon fas fa-chart-pie" style="color: gold;"></i>
            <p>
              แก้ไขข้อมูลส่วนตัว
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="change_password.php" class="nav-link">
            <i class="nav-icon fas fa-chart-pie" style="color: gold;"></i>
            <p>
              เปลี่ยนรหัสผ่าน
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="tmp_form.php" class="nav-link">
            <i class="nav-icon far fa-edit"></i>
            <p>
              แสดงข้อมูลสมาชิก
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="tmp_datatable.php" class="nav-link">
            <i class="nav-icon fas fa-border-all"></i>
            <p>
              แสดงข้อมูลกิจกรรม
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="admin.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              แสดงข้อมูลชมรม
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="admin.php" class="nav-link">
            <i class="nav-icon fas fa-cat"></i>
            <p>
              ลงทะเรียนกิจกรรม
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <i class="nav-icon fas fa-door-open" style="color: gold;"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>