document.addEventListener("DOMContentLoaded", function () {
    var loginBtn = document.getElementById("loginbtn");
    var cartBtn = document.getElementById("cartBtn");
    var personBtn = document.getElementById("logoutBtn");

    if (document.cookie.indexOf("acc") !== -1) {
        // Cookie "acc" tồn tại, ẩn nút đăng nhập và hiển thị nút giỏ hàng và nút đăng xuất
        loginBtn.style.display = "none";
        cartBtn.style.display = "inline-block"; // Hoặc "block" tùy vào kiểu hiển thị của nút
        personBtn.style.display = "inline-block";
    } else {
        // Cookie "acc" không tồn tại, hiển thị nút đăng nhập và ẩn nút giỏ hàng và nút đăng xuất
        loginBtn.style.display = "inline-block";
        cartBtn.style.display = "none";
        personBtn.style.display = "none";
    }
});