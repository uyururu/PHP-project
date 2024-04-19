<?php
$act = 'forget';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forget':
        include_once "./View/forgetpassword.php";
        break;
    case 'forget_action':
        // nhận email về 
        if (isset($_POST['submit_email'])) {
            $email = $_POST['txtemail'];
            $_SESSION['txtemail'] = array();
            // kiểm tra email có tồn tại trên database không 
            $usr = new user();
            $checkemail = $usr->getEmail($email);
            if ($checkemail != false) {
                $code = random_int(1000, 9999);
                // tạo đối tượng 
                $item = array(
                    'id' => $code,
                    'email' => $email,
                );
                $_SESSION['txtemail'][] = $item;
                // tiến hành gửi email 
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // GMAIL username to:
                // $mail->Username = "php22023@gmail.com";//
                $mail->Username = "trivinh12a3@gmail.com"; //
                // GMAIL password
                // $mail->Password = "php22023ngoc";
                $mail->Password = "omocziquegjidtwm"; //Phplytest20@php
                $mail->SMTPSecure = "tls";  // ssl
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = "587"; // 465
                $mail->From = 'trivinh12a3@gmail.com';
                $mail->FromName = 'Vinh';
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($email, 'reciever_name');
                $mail->Subject = 'Reset Password';
                $mail->IsHTML(true);
                $mail->Body = 'Cấp lại mã code ' . $code . '';
                if ($mail->Send()) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                } else {
                    echo "Mail Error - >" . $mail->ErrorInfo;
                    include "./View/home.php";
                }
                // include "./View/resetpw.php";
            } else {
                echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                include "./View/home.php";
            }
        }
        break;
    case 'resetpass':
        if (isset($_POST['submit_password'])) {
            $codeold = $_POST['password'];
            foreach ($_SESSION['txtemail'] as $key => $item) {
                if ($item['id'] == $codeold) {
                    $saltF = "G4563@";
                    $saltL = "fa34%!";
                    $passnew = md5($saltF . $codeold . $saltL);
                    $emailold = $item['email'];
                    // viết pt update
                    $usr = new user();
                    $usr->getPassNew($emailold, $passnew);
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
        break;
}
?>