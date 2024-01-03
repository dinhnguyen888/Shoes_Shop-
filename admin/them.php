<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
<h4 class="col-10 m-auto p-2 text-center">THÊM SẢN PHẨM</h4>
<form action="" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên sản phẩm</label> <input name="tensp" type="text" class="form-control" />
    </div>
    <div class="form-group">
        <label>Số lượng</label> <input name="soluong" type="text" class="form-control" />
    </div>
    <div class="form-group">
        <label>Giá</label> <input name="gia" type="text" class="form-control" />
    </div>
    <div class="form-group">
        <label>Hình ảnh</label> <input name="linksp" type="file" class="form-control" />
    </div>

    <div class="form-group">
        <input name="btn" type="submit" value="Thêm" class="btn btn-primary" />
    </div>
</form>

<?php
if (isset($_POST['btn'])) {
    $tensp = $_POST['tensp'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['gia'];
    $linkImg = 'bainopthi/public/imgs/';

    $tensp = trim(strip_tags($tensp));
    settype($soluong, "int");
    settype($gia, "int");

    $targetPath = $linkImg . $_FILES['linksp']['name'];
    $targetPath = trim(strip_tags($targetPath));

    function themTheLoai($tensp, $soluong, $gia, $targetPath)
    {
        require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';
        $database = new Database('localhost', 'root', '', 'tblproduct');

        $sql = "INSERT INTO product (tensp, gia, soluong, linkimg) VALUES ('$tensp', '$gia', '$soluong', '$targetPath')";
     
        $kq = $database->query($sql);
        return $kq == 1;
    }

    $kq = themTheLoai($tensp, $soluong, $gia, $targetPath);
    if ($kq) {
        header("location:admin.php");
        exit();
    }
}
?>
