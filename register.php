<html>
<head>
    <title>Đăng kí</title>
    <link rel="stylesheet" href="CSS/1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>
<body>
<form action="register.php" method="post">
    <div class="to">
        <div class="form">
            <h2>Đăng kí</h2>
            <i class="fab fa-app-store-ios"></i>
            <label style="margin-left: -180px;">Username </label>
            <input type="text" name="username">
            <label style="margin-left: -180px;">Mật Khẩu </label>
            <input type="password" name="pass">
            <label style="margin-left: -180px;">ID  </label>
            <input type="text" name="name">
            <label style="margin-left: -180px;">Email </label>
            <input type="text" id= "email" name="email">
            <input id="submit" type="submit" name="btn_submit" value="Gửi">

        </div>
    </div>
</form>

<?php
require('lib/connection.php');
if (isset($_POST["btn_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    if ($username == "" || $password == "" || $name == "" || $email == "") {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    }else{
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql="select * from users where username='$username'";
        $kiemtra=mysqli_query($conn, $sql);

        if(mysqli_num_rows($kiemtra)  > 0){
            error_log("Tài khoản đã tồn tại");
        }else{
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "INSERT INTO users(username,password,name,email) VALUES ('$username','$password','$name','$email')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn,$sql);
            echo "Đăng kí thành công";
        }
    }
}
?>

</body>
</html>