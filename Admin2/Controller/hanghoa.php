<?php
$act = "hanghoa";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;

    case 'hanghoa_action':
        include_once "./View/edithanghoa.php";
        break;
    case 'insert_action':
        // nhận thôngt in
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            // dem thong tin này insert vào database
            $hh = new hanghoa();
            $check = $hh->insertHangHoa($tenhh, $maloai, $mota, $ngaylap, $dacbiet);
            if ($check !== false) {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../Admin2/index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }
        }
        break;
    case 'update_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'update_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            // dem thong tin này insert vào database
            $hh = new hanghoa();
            $check = $hh->updateHangHoa($mahh, $tenhh, $maloai, $mota, $ngaylap, $dacbiet);
            if ($check !== false) {
                echo '<script>alert("Update dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../Admin2/index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("UPdate dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }
        }
        break;
}

?>