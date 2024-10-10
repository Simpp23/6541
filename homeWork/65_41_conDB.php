<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbName = 'db_634230044';
$tableName = 'tb_shoesProduct';

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
    } catch (PDOException $e) {
      echo "เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . $e->getMessage();
    }
?>