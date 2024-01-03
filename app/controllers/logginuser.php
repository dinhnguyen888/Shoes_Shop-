<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acc = $_POST['acc'];
    $pass = $_POST['pass'];
  
    require_once 'c:\xampp\htdocs\bainopthi\app\models\imgmodel.php';
    $database = new Database('localhost', 'root', '', 'tblproduct');

    $query = "SELECT * FROM tbluser WHERE account='$acc' and password = '$pass'";
    $result = $database->query($query);

    if ($result->num_rows > 0) {
        // Đăng nhập thành công
        $response = array('status' => 'success');
        echo json_encode($response);
        setcookie("acc", $acc, time() + 3600, "/");
    
    } else {
        // Đăng nhập thất bại
        $response = array('status' => 'failure', 'message' => 'Không tồn tại user hoặc nhập sai mật khẩu');
        echo json_encode($response);
    }

    $database->close();
}
?>
