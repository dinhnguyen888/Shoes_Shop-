<?php
ob_start(); // Start output buffering
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2251120286</title>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/add-r.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/close-r.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/import.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-off.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/pen.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/trash.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/search.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/software-upload.css' rel='stylesheet'>
    <link rel="stylesheet" href="/bainopthi/public/css/admin.css">
</head>
<body>
    <div class="xinchao">
        <h1 onclick="window.location.href ='admin.php'">Chào mừng trở lại, ông chủ</h1>
        <button onclick="window.location.href = 'loginad.php'"><i class="gg-log-off"></i>Đăng xuất</button>
    </div>
<div class="over">
    <div class="func">
    <form method="POST" action="admin.php" class="search">
        <input type="text" name="search" placeholder="Search by name...">
        <button type="submit"><i class="gg-search"></i> Search</button>
    </form>
    <button class= 'add' name="them"><a href="them.php" style='display:flex;'> <p class='gg-add-r'></p>Add Product</a></button>
</div>






<?php
require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';

$database = new Database('127.0.0.1', 'root', '', 'tblproduct');

// Kiểm tra xem nút tìm kiếm đã được nhấn chưa
if (isset($_POST['search'])) {
    // Lấy dữ liệu từ ô tìm kiếm
    $searchTerm = $_POST['search'];

    // Tạo câu truy vấn SQL với điều kiện tìm kiếm
    $query = "SELECT * FROM product WHERE tensp LIKE '%$searchTerm%'";
    $result = $database->query($query);

    // Hiển thị kết quả tìm kiếm
    if ($result->num_rows > 0) {
        echo " <h1 class='tieude'>Kết quả</h1>
        ";
        while ($row = $database->fetchAssoc($result)) {
            // Hiển thị sản phẩm tìm thấy
            echo "<div class=\"sanpham\"><div class=\"box-san-pham\">
                <img class=\"img\" src=\"/{$row['linkimg']}\" alt=\"\" style=\"height: 195px; width: 195px;\">
                <p class=\"ten-san-pham\">{$row['tensp']}</p>
                <p class=\"gia\">{$row['gia']} đ</p>
             
                <form class='chucnang' method='POST'>
                <button type='submit' value ='{$row['id']}' name='sua' class='suabtn2' class='edit-btn'><i class='gg-pen'></i></button>
                <button type='submit' value ='{$row['id']}' name='xoa' class='xoabtn2'><i class='gg-trash'></i></button>
            </form> </div>"  ;
            
        // Hiển thị form sửa sản phẩm nếu nút "Sửa" được nhấn
        if (isset($_POST['sua']) && $_POST['sua'] == $row['id']) {
            $isUpdateFormVisible = true;
            echo "<form method='POST'>
            <tr>
            <td>
            <i class='gg-import'></i>
            </td>
            <td>
            <input type='text' class='ten' id='newProductName' name='newProductName' value='{$row['tensp']}'>
            </td>
            <td>
            <input type='text' class='giatien' id='newProductPrice' name='newProductPrice' value='{$row['gia']}'>
            </td>
            <td>
            <button type='submit' name='update' value='{$row['id']}'><i class='gg-software-upload'></i></button>
            <button type='submit' name='cancel'class='gg-close-r'></button>
            </td>
            </tr>
        </form>";
        }
        echo "</div> ";
        
        }
    } else {
        echo "<h1 class='tieude'>Không tìm thấy sản phẩm.</h1>";
    }

    // Kết thúc xử lý, tránh hiển thị sản phẩm bình thường
    $database->close();
    exit();
}



?>




    
        <h1 class='tieude'>List sản phẩm</h1>
        <table>

        <thead>
            <tr>
                <!-- Các ô tiêu đề được tạo bằng thẻ <th> -->
                <th>Mã hàng</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Action</th>
            </tr>
        <?php 
        require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';

        $database = new Database('127.0.0.1', 'root', '', 'tblproduct');

        $isUpdateFormVisible = false; // Biến để kiểm soát trạng thái của form update

        $query = "SELECT * FROM product";
        $result = $database->query($query);

        if ($result->num_rows > 0) {
            while ($row = $database->fetchAssoc($result)) {
                echo "<tbody><tr>
                <td class=\"mah\">{$row['id']}</td>
                   
                    <td class=\"ten-san-pham\">{$row['tensp']}</td>
                    <td class=\"gia\">{$row['gia']} đ</td>
                   <td>
                   <form class='chucnang' method='POST'>
                    <button type='submit' value ='{$row['id']}' name='sua' class='edit-btn'><i class='gg-pen'></i></button>
                        <button type='submit' value ='{$row['id']}' name='xoa' class='xoabtn'><i class='gg-trash'></i></button>
                  

                    </form></td></tbody>";

                // Hiển thị form sửa sản phẩm nếu nút "Sửa" được nhấn
                if (isset($_POST['sua']) && $_POST['sua'] == $row['id']) {
                    $isUpdateFormVisible = true;
                    echo "<form method='POST'>
                <tr>
                <td>
                <i class='gg-import'></i>
                </td>
                <td>
                <input type='text' class='ten' id='newProductName' name='newProductName' value='{$row['tensp']}'>
                </td>
                <td>
                <input type='text' class='giatien' id='newProductPrice' name='newProductPrice' value='{$row['gia']}'>
                </td>
                <td class='sua'>
                <button type='submit' name='update' value='{$row['id']}'><i class='gg-software-upload'></i></button>
                <button type='submit' name='cancel'class='gg-close-r'></button>
                </td>
                </tr>
            </form>";
                }
                echo "</div>";
            }
        } else {
            echo "Không có dữ liệu";
        }

        if (isset($_POST['xoa'])) {
            $id = $_POST['xoa'];
            settype($id, "int");

            function xoasanpham($id)
            {
                require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';
                $database = new Database('localhost', 'root', '', 'tblproduct');
                $sql = "DELETE FROM product WHERE id = $id;";
                $kq = $database->query($sql);
                return $kq == 1;
            }

            $kq = xoasanpham($id);

            if ($kq) {
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            }
        }
        if (isset($_POST['update'])) {
            $id = $_POST['update'];
            $newProductName = $_POST['newProductName'];
            $newProductPrice = $_POST['newProductPrice'];
          

            // Thực hiện cập nhật thông tin sản phẩm trong cơ sở dữ liệu
            $updateSql = "UPDATE product SET tensp='$newProductName', gia='$newProductPrice' WHERE id=$id";
            $updateResult = $database->query($updateSql);

            if ($updateResult) {
                // Chuyển hướng để làm mới trang sau khi cập nhật thành công
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            }
        }

        // Đóng kết nối
        $database->close();
        ?>
</table>
        
</div>    

<script>
window.addEventListener('scroll', function() {
    localStorage.setItem('scrollPosition', window.scrollY);
});
window.addEventListener('load', function() {
    var savedScrollPosition = localStorage.getItem('scrollPosition');
    if (savedScrollPosition !== null) {
        window.scrollTo(0, savedScrollPosition);
    }
});

</script>
</body>
</html>
<?php
ob_end_flush(); // Flush the output
?>
