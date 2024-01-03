<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $linkimg = $_POST['linkImg'];
    $linkImg=addslashes($linkimg);

    


    require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';
    $database = new Database('localhost', 'root', '', 'tblproduct');


    $query = "DELETE FROM productsold WHERE tensp = '$tensp'";

    $result = $database->query($query);
    


    if ($result) {
        echo "xóa thành công";
        echo $query;
    } else {
        echo "Lỗi khi xóa hàng: " ; 
        echo $query;
    }

    $database->close();
}
?>
