<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang login quản trị viên </title>
    <link rel="stylesheet" href="\bainopthi/public/css/login.css">
</head>

<body>
    
    </div>
    <form method="POST">
        <h3>Trang quản trị viên</h3>
        <h3>Đăng nhập</h3>
   

        <label for="username">Tài khoản</label>
        <input name="user" type="text" placeholder="Email or Phone" id="acc" autocomplete="off">

        <label for="password">Mật Khẩu</label>
        <input name="pass" type="password" placeholder="Password" id="password" autocomplete="off">

        <button id="btn" name="btn">Đăng nhập</button>


        

    </form>
<?php
  require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';
session_start();

if(isset($_POST['btn'])){
    $user = $_POST['user'];
$pass = $_POST['pass'];
    $user = trim(strip_tags($user));
    $pass = trim(strip_tags($pass));
    $database = new Database('127.0.0.1', $user, $pass, 'tblproduct');  
if($database->connect()){
    echo "<script> alert('đăng nhập thành công'); window.location.href= 'admin.php'</script>";

    
} else{ echo"<script> alert('đăng nhập thất bại')</script>";}

}

?>





</body>

</html>