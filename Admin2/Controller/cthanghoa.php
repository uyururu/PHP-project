<?php
$act = "cthanghoa";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'cthanghoa':
        include_once "./View/cthanghoa.php";
        break;

    case 'cthanghoa_action':
        if (isset ($_POST["submit"])) {
            $mahh = $_POST['mahh'];
            $mamau = $_POST['mamau'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $slt = $_POST['slt'];
            $chitiet = $_POST['chitiet'];
            $hinh = $_FILES['image']['name'];
            // đem thông tin insert vào database
            $ct = new cthanghoa();
            $check = $ct->insertCTHangHoa($mahh, $mamau, $dongia, $giamgia, $slt, $chitiet, $hinh);
            if ($check !== false) {
                uploadImage();
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../Admin2/index.php?action=cthanghoa"/>';
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../Admin2/index.php?action=cthanghoa"/>';
            }
        }
        break;
}
?>