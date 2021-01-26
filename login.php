<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">-->
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="CSS/1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>
<body>

<form method="POST" action="login.php">
    <div class="to">
        <div class="form">
            <h2>Đăng nhập</h2>
            <i class="fab fa-app-store-ios"></i>
            <label style="margin-left: -180px;">Username </label>
            <input type="text" name="username">
            <label style="margin-left: -180px;">Mật Khẩu </label>
            <input type="password" name="password">
            <input id="submit" type="submit" name="btn_submit" value="Gửi">
            <tr>
                <td>Bạn chưa có tài khoản? <a href='register.php'>Đăng ký ngay</a></td>
            </tr>
        </div>
    </div>
</form>

<?php
require_once("lib/connection.php");
if (isset($_POST["btn_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password =="") {
        echo "Username hoặc password bạn không được để trống!";
    }else{
        $sql = "select * from users where username = '$username' and password = '$password' ";
        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo "Tên đăng nhập hoặc mật khẩu không đúng !";
        }else{
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $username;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: index.php');
        }
    }
}
?>
</body>
</html>