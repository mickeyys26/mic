<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<html>
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
</head>
<body>
<!--Đăng nhập thành công !
<br><br>
<br><br>-->
<form method="POST" action="./upload.php" enctype="multipart/form-data">
    <div class="form">
        <h3>Choose file</h3>
        <input type="file" name="upload_file">
        <input type="submit" name="submit" value="Upload">
    </div>
</form>
<br><br>
<button name ="button" type="button"><a href="login.php">Đăng xuất</a></button>
<?php
session_destroy();
?>
</body>
</html>