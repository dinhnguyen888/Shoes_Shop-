<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $linkimg = $_POST['linkImg'];
    $linkImg=addslashes($linkimg);
    $acc = $_COOKIE["acc"];
    // Thực hiện xử lý mua hàng ở đây, có thể sử dụng $tensp, $gia, $soluong, $linkImg


    require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';
    $database = new Database('localhost', 'root', '', 'tblproduct');


    $query = "INSERT INTO productsold (tensp, soluong, gia, linkimg, acc) VALUES ('$tensp', $soluong, $gia, '$linkImg','$acc')
    ";
     $database->query($query);
    


    if ($result) {
        echo "Mua hàng thành công!";
        echo $query;
    } else {
        echo "Lỗi khi mua hàng: " ; 
        echo $query;
    }

    $database->close();
}
?>
