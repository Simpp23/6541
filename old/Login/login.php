<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Login</h2>
            
            <div class="card my-5">
    
              <form class="card-body cardbody-color p-lg-5" action='login.php' method='post'>
    
                <div class="text-center">
                  <img src="https://media1.tenor.com/m/GOabrbLMl4AAAAAd/plink-cat-plink.gif" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                    width="200px"  alt="profile">
                </div>
    
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name='username' id="Username" aria-describedby="emailHelp"
                    placeholder="UserName">
                    <label>Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name='password'id="password" placeholder="password">
                  <label class="form-label">Password</label>
                </div>
                <div class="text-center" ><button type="submit" style="width: 200px; box-shadow: 0px 0px 2px 0px #8b8b8b;" class="btn btn-color px-5 mb-5">Login</button></div>
                <div id="email" class="form-text text-center mb-5 text-dark">Not
                  Registered? <a href="#" class="text-dark fw-bold"> Create an
                    Account</a>
                </div>
              </form>
            </div>
    
          </div>
        </div>
      </div>
</body>
<?php
      session_start();
      $username = 'masonsimpp';
      $password = '1234567899';
      $severname = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $database = "simpp";
      $tableName = 'son';

      

      $connect = new mysqli($severname,$dbUsername,$dbPassword);
      

      function checkTableExists($connection, $dbname,$tablename){
        $connection->select_db($dbname);
        $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '$tablename' AND TABLE_SCHEMA = DATABASE()";
        $result = $connection->query($sql);
    
        return $result && $result->num_rows > 0;
      } 

      function checkDatabaseExists($connection, $dbname){
        $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
        $result = $connection->query($sql);
      
        if ($result && $result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
      }
      
      
      function usernameExists($connection, $database, $tableName, $username) {
        $connection->select_db($database);
        $username = $connection->real_escape_string($username);
        $sql = "SELECT * FROM $tableName WHERE username = '$username'";
        $result = $connection->query($sql);
        return $result->num_rows > 0;
    }
       
      if(checkDatabaseExists($connect,$database) === false){
        $sql = "CREATE DATABASE $database";
        if ($connect->query($sql)) {
        echo "<script>console.log('Database created successfully')</script>";
        } else {
        echo "<script>console.log('Error creating database: " . $connect->error. "')</script>";
        }
      }else{
        
      }

      if(checkTableExists($connect,$database,$tableName) === false){
      $connect->select_db($database);
      $sql ="CREATE TABLE $tableName(
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL UNIQUE,
      password TINYTEXT NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";

    if($connect->query($sql)){
      echo "<script>console.log('Table created! ')</script>";
    }else{
      echo "<script>console.log('Error: $connect->error ')</script>";
    }
  
    }

    
    if(checkTableExists($connect,$database,$tableName)){
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $email = 'default@example.com';
      if(usernameExists($connect,$database,$tableName,$username) === false){
      $stmt = $connect->prepare("INSERT INTO $tableName (username, password, email) VALUES (?, ?, ?)");
      $stmt->bind_param('sss', $username, $hashed_password, $email);
  
      if ($stmt->execute()) {
          echo "<script>console.log('Default user has been registered')</script>";
      } else {
          echo "<script>console.log('Error: " . $stmt->error . "')</script>";
      }
      $stmt->close();
    }
      }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];

      
      $connect->select_db($database);
        
        $username = $connect->real_escape_string($username);
        $stmt = $connect->prepare("SELECT * FROM son WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $data = $stmt->get_result();
            
        if($data->num_rows > 0){
            $rows = $data->fetch_assoc();
            if(password_verify($password,$rows['password'])){
                
              $_SESSION['username'] = $rows['username'];
                
                echo "<script>console.log('Login Successfully')</script>";
                header("Location: landing.php");
                exit(); // Ensure no further output after redirect
              }else{
                echo "<script>console.log('Incorrect Password Entered : $password password from database : ". $rows['password'] . "')</script>";
              }
            }  

    }

      
  ?>
</html>