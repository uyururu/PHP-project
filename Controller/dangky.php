<?php
$act = 'dangky';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once "./View/registration.php";
        break;
    case 'dangky_action':
        // gửi toàn bộ thông tin qua đây, post gửi đi thông qua thẻ (input, select)  
        // nhận, trước khi nhận cần kiểm tra 
        // $tenkh = '';
        $dc = '';
        $sodt = '';
        $user = '';
        $email = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            // $tenkh = $_POST['txttenkh'];
            $dc = $_POST['txtdiachi'];
            $sodt = $_POST['txtsodt'];
            $user = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            $saltF = "G4563@";
            $saltL = "fa34%!";
            $passnew = md5($saltF . $pass . $saltL);
            // Controller yêu cầu thông tin này cần được thêm vào database 
            // trước khi insert cần kiểm tra xem username và email này cp1 tồn tại hay chưa 
            $kh = new user();
            $check = $kh->getCheckUser($user, $email)->rowCount();
            // $count = 
            // var_dum($check);
            if ($check > 0) {
                echo '<script>alert("Username hoặc email đã tồn tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            } else {
                // ko có thì thêm vào 
                $newkh = $kh->insertKhachHang($user, $passnew, $email, $dc, $sodt);
                if ($newkh !== false) {
                    echo '<script>alert("Đăng ký thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                    include_once "./View/home.php";
                } else {
                    echo '<script>alect("Đăng ký ko thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                    // include_once "./View/home.php";
                    // window . open("./View/registration_form.php", "_blank");
                    // echo '<script>window.open("./View/form.php", "_blank");</script>';
                }
            }
        }
        break;
}
?>