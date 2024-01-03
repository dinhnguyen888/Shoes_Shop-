<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="\bainopthi/public/css/register.css">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form>
        <h3>Đăng kí</h3>
        <label for="username">Tên người dùng</label>
        <input type="text" placeholder="name" id="username" name="user">

        <label for="username">tài khoản</label>
        <input type="text" placeholder="Email or Phone" id="acc" name="acc">

        <label for="password">Mật Khẩu</label>
        <input type="password" placeholder="Password" id="password" name="pass">

        <label for="password">Xác nhận mật khẩu</label>
        <input type="password" placeholder="Password" id="password2" >

        <button onclick="register(this)"
        >đăng kí
</button>

        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>

<script>
function register() {
    var user = document.getElementById("username").value;
    var acc = document.getElementById("acc").value;
    var pass = document.getElementById("password").value;
    var pass2 = document.getElementById("password2").value;

    if (pass === pass2) {
        alert("Đăng kí thành công");

        var userInfo = {
            name: user,
            account: acc,
            pass: pass
        };

        // Sử dụng AJAX để gửi dữ liệu lên máy chủ
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/bainopthi/app/controllers/createuser.php", true);

        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Chuẩn bị dữ liệu để gửi
        var data = "name=" + encodeURIComponent(userInfo.name) +
                   "&acc=" + encodeURIComponent(userInfo.account) +
                   "&pass=" + encodeURIComponent(userInfo.pass);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Phản hồi từ máy chủ (nếu cần)
           
        
            }
        };
       
        // Gửi dữ liệu
        xhr.send(data);
        window.open('login.php');
        window.close()
       
    } else { 
        alert("Xác nhận mật khẩu không trùng khớp");
    }
}


</script>






</body>

</html>