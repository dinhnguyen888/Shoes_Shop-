<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="\bainopthi/public/css/login.css">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form>
        <h3>Đăng nhập</h3>
   

        <label for="username">Tài khoản</label>
        <input type="text" placeholder="Email or Phone" id="acc">

        <label for="password">Mật Khẩu</label>
        <input type="password" placeholder="Password" id="password">

        <button id="btn" onclick="accept(this) ">Đăng nhập</button>


        <p>Bạn chưa có tài khoản? Vui lòng <a href="register.php">Đăng kí</a> tại đây</p>

    </form>
<?php
  require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';


  $database = new Database('127.0.0.1', 'root', '', 'tblproduct');  

?>





    <script>
function accept(button) {
    var acc = document.getElementById("acc").value;
    var pass = document.getElementById("password").value;


        
        var userInfo = {
            
            account: acc,
            pass: pass
        };

        // Sử dụng AJAX để gửi dữ liệu lên máy chủ
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/bainopthi/app/controllers/logginuser.php", true);

        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Chuẩn bị dữ liệu để gửi
        var data = 
                   "&acc=" + encodeURIComponent(userInfo.account) +
                   "&pass=" + encodeURIComponent(userInfo.pass);

        xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            
            if (response.status === "success") {
                alert("Đăng nhập thành công");
                

            window.location.href = 'home.php';
               
            } else {
                alert("Đăng nhập thất bại: " + response.message);
                
            }
        }
    };

        // Gửi dữ liệu
        xhr.send(data);


       


  

}</script>
</body>

</html>