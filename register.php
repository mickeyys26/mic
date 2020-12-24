<html>
<head>
    <title>Form đăng ký thành viên</title>
</head>
<body>
<?php
require('lib/connection.php');
if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username == "" || $password == "" || $name == "" || $email == "") {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    }else{
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql="select * from users where username='$username'";
        $kiemtra=mysqli_query($conn, $sql);

        if(mysqli_num_rows($kiemtra)  > 0){
            echo "Tài khoản đã tồn tại";
        }else{
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "INSERT INTO users(username,password,name,email) VALUES ('$username','$password','$name','$email')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn,$sql);
            echo "chúc mừng bạn đã đăng ký thành công";
        }


    }
}
?>
<form action="register.php" method="post">
    <fieldset>
        <legend>Đăng kí</legend>
        <table>
            <tr>
                <td>Username :</td>
                <td><input type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" id="pass" name="pass"></td>
            </tr>
            <tr>
                <td>Họ và tên:</td>
                <td><input type="text" id="name" name="name"></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="text" id="email" name="email"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Đăng ký"></td>
            </tr>

        </table>
    </fieldset>
</form>
</body>
</html>