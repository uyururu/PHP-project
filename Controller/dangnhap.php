<?php
$act = "dangnhap";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
    case 'dangnhap_action':
        $user = '';
        $pass = '';
        if (isset($_POST['txtusername']) && isset($_POST['txtpass'])) {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpass'];
            $saltF = "G4563@";
            $saltL = "fa34%!";
            $passnew = md5($saltF . $pass . $saltL);
            // Controller yêu cầu model xem có tài khoản này không 
            $hh = new user();
            $logkh = $hh->logKhahHang($user, $passnew);
            if ($logkh) {
                // Khi đăng nhập thành công thì luu5 thông tin vào trong session
                $_SESSION['IdKhachHang'] = $logkh['IdKhachHang'];
                $_SESSION['username'] = $logkh['username'];
                echo '<script> alert("Đăng nhập thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            } else {
                echo '<script> alert("Đăng nhập không thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            }
        }
        break;
    case 'dangxuat':
        unset($_SESSION['IdKhachHang']);
        unset($_SESSION['username']);
        echo '<meta http-equiv="refresh" content ="0;url=./index.php?action=home"/>';
}

?>