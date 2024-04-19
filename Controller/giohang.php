<?php
if (!isset ($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
;
$act = "giohang";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        include_once "./View/cart.php";
        break;
    case 'giohang_action':
        $mahh = 0;
        $mausac = 0;
        $soluong = 0;
        if (isset ($_POST['mahh'])) {
            $mahh = $_POST['mahh'];
            // $mausac = $_POST['mymausac'];
            $soluong = $_POST['soluong'];
            $hidden_soluong = $_POST['hidden_soluong'];
            if (empty ($_POST['mymausac'])) {
                $mau = $hh->getHangHoaMau($mahh);
                $firstMau = $mau->fetch();
                $mausac = $firstMau['IdMau'];
            } else {
                $mausac = $_POST['mymausac'];
            }
            $gh = new giohang();
            $add = $gh->addGioHang($mahh, $mausac, $soluong, $hidden_soluong);
            // $hangtonkho = $hd->getHangTon($mahh, $mausac);
            // $hangtonkho = intval($hangtonkho);
            // $hangtonkho -= $soluong;
            // $hd->updateHangHoaTon($mahh, $mausac, $hangtonkho);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        }
        break;
    case 'giohang_xoa':
        if (isset ($_GET['id'])) {
            $id = $_GET['id'];
            unset($_SESSION['cart'][$id]);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        }
        break;
    case 'giohang_update':
        // nhận giá trị từ thẻ input và select 
        if (isset ($_POST['newqty'])) {
            $newsoluong = $_POST['newqty'];
            // do duyệt qua $_sSESSION['cart'] đối tượng nào có số lượng
            // khác với số lượng $newsoluong thì 
            foreach ($newsoluong as $key => $value) {
                // $quantiy_default = $set['cart'][$key]['default_quantity'];
                if ($_SESSION['cart'][$key]['soluong'] != $value) {
                    $gh = new giohang();
                    $gh->updateGioHang($key, $value);
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';

                }
            }
        }
        break;
}
?>