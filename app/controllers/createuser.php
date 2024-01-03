<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $acc = $_POST['acc'];
    $pass = $_POST['pass'];
   

    // Thực hiện xử lý mua hàng ở đây, có thể sử dụng $tensp, $gia, $soluong, $linkImg


    require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';
    $database = new Database('localhost', 'root', '', 'tblproduct');


    $query = "INSERT INTO tbluser (tenuser, account, password) VALUES ('$name', '$acc', '$pass')
    ";
    $result = $database->query($query);
    


    if ($result) {
        echo "tạo user thành công!";
        echo $query;
    } else {
        echo "Lỗi tạo user: " ; 
        echo $query;
    }

    $database->close();
}
?>
