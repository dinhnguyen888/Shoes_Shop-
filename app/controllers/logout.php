<?php
// logout.php
if (isset($_COOKIE['acc'])) {
   
    setcookie("acc", "", time() - 3600, "/");
}

?>
<script>
    window.location.href = '/bainopthi/app/views/home.php'
</SCript>