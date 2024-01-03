<html>

<head>
    <title>2251120286</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="\bainopthi/public/css/home.css">
    <link rel="stylesheet" href="/bainopthi/public/css/footer.css">
</head>

<body>
    <div class="main">
        <div class="banner">
        <img src="/bainopthi\public\imgs\danh-muc-converse-0322.jpg" alt="Banner Image" width="1000" height="200">

        </div>
        <div class="menu">
            <a href="home.php">Trang chủ</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Dịch vụ</a>
            <a href="#">Sản phẩm</a>
            <a href="#">Liên hệ</a>
            <a href="cart.php" id='cartBtn'>Giỏ hàng</a>
            <a href="login.php" id='loginbtn'>Đăng nhập</a>
            <a href="/bainopthi/app/controllers/logout.php" id='logoutBtn'>Đăng xuất</a>
            <a href="" id='' onclick="window.open('/bainopthi/admin/loginad.php')">Admin...</a>


        </div>
        <div class="clear"></div>

        <div class="trai">
            <h3> danh mục sản phẩm</h3>
            <ul>
                <li><a href="#">Chuck Taylor</a>
                    <ul>
                        <li><a href="#">70s</a></li>
                        <li><a href="#">SMART KIT</a></li>
                        <li><a href="#">ANNIVERSARY</a></li>
                    </ul>
                    </11>
                <li><a href="#">StarLight</a>
                <ul>
                    <li><a href="#">HOLYSHOES</a></li>
                    <li><a href="#">FALLOUT</a></li>
                    <li><a href="#">1990S</a></li>
                </ul>
                <li><a href="#">ON TO THE TOP</a>
                <ul>
                    <li><a href="#">DSAS</a></li>
                    <li><a href="#">CUSTOMER</a></li>
                    <li><a href="#">LIMITED</a></li>
                </ul>
                </11>
            <li><a href="#">CLASSICAL</a>
                <ul>
                    <li><a href="#">B.C</a></li>
                    <li><a href="#">FUTURE</a></li>
                    <li><a href="#">CONFIDENT</a></li>
                </ul>
            </ul>
        </div>
        <div class="phai">
            <div class="slide"> <img
                    src="/bainopthi/public/imgs/converse-1420x400_13c0eeedbd2f4aabaca1c27cc93b5cc1.webp" width="760">
            </div>
            <div class="sanpham">
                <h1>sản phẩm nổi bật</h1>
                
<?php 

require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';


$database = new Database('127.0.0.1', 'root', '', 'tblproduct');


$query = "SELECT * FROM product";
$result = $database->query($query);


if ($result->num_rows > 0) {
    while ($row = $database->fetchAssoc($result)) {
        echo "<div class=\"box-san-pham\">
        <img class=\"img\" src=\"/{$row['linkimg']}\" alt=\"\" style=\"height: 195px; width: 195px;\>
            <p class=\"ten-san-pham\">{$row['tensp']}</p>
            <p class=\"gia\">{$row['gia']} đ</p>
            <p class=\"soluong\">Số lượng:{$row['soluong']}</p>
            <button class=\"buy-button\" 
            data-tensp=\"{$row['tensp']}\" 
            data-gia=\"{$row['gia']}\" 
            data-soluong=\"{$row['soluong']}\" 
            data-linkimg=\"{$row['linkimg']}\"
            onclick=\"getProduct(this)\">Mua hàng</button>
     
        </div>";    
    


    }
} else {
    echo "Không có dữ liệu";
}


$database->close();
?>
               
            </div>
        </div>
    </div>
    <div class="clear"></div>

    <div class="footer">
        <div class="menuduoi">
            <a href="#">Trang chủ</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Dịch vụ</a>
            <a href="#">Sản phẩm</a>
            <a href="#">Liên hệ</a>
            <a href="login.php">Đăng nhập</a>
        </div>
        <p align="center"> copy: 2014 Designed by <a href="http://www.thayphet.net/" target="_blank">Templates
                Perfect</a></p>
    </div>
    </div>
</body>
<script>
    function getProduct(button) {
        var hasAccCookie = document.cookie.includes('acc=');

if (!hasAccCookie) {
    alert('Bạn chưa đăng nhập');
} else {
        var decide = confirm("XÁC NHẬN MUA HÀNG?");
        if (decide) {
            alert('Mua hàng thành công');

            var productInfo = {
                tenSanPham: button.getAttribute('data-tensp'),
                gia: button.getAttribute('data-gia'),
                soLuong: button.getAttribute('data-soluong'),
                link: button.getAttribute('data-linkimg')
            };


            // dung AJAX de gui den purchase.php
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/bainopthi/app/controllers/purchase.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // chuan bi gui du lieu 
            var data = "tensp=" + encodeURIComponent(productInfo.tenSanPham) +
                       "&gia=" + encodeURIComponent(productInfo.gia) +
                       "&soluong=" + encodeURIComponent(productInfo.soLuong) +
                       "&linkImg=" + encodeURIComponent(productInfo.link)
                       ;

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText); 
                }
            };

            // gui du lieu di 
            xhr.send(data);
        }
    }}
</script>

<script src="/bainopthi/public/js/script.js"></script>

</html>
















