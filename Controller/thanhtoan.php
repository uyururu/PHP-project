<?php
$act = "thanhtoan";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'thanhtoan':
        // controller yêu cầu model insert vào database
        // mới có thông tin hiển thị lên model
        $hd = new hoadon();
        if (isset ($_SESSION['IdKhachHang'])) {
            $makh = $_SESSION['IdKhachHang'];
            $sohd = $hd->insertHoaDon($makh);
            $_SESSION['IdHoaDon'] = $sohd;
            // tiến hành thêm vào bảng chi tiết hóa đơn 
            // duyệt qua giỏ hàng, 
            //đem thông tin từng món hàng add vào database 
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $item) {
                // viết vào bảng chi tiết hóa đơn
                $hd->insertCTHoaDon(
                    $sohd,
                    $item['mahh'],
                    $item['soluong'],
                    $item['thanhtien'],
                    $item['mausac'],
                );
                $idhang = $item['mahh'];
                $idmau = $item['idmau'];
                $hangtonkho = $hd->getHangTon($idhang, $idmau);
                $soluongton = 0;
                while ($set = $hangtonkho->fetch()) {
                    $soluongton = $set['So_Luong'];
                    $soluongton -= $item['soluong'];
                    $hd->updateHangHoaTon($idhang, $idmau, $soluongton);
                }
                // sau khi thực thi isert vào bảng chi tiết hóa đơn thì 
                // update tổng thành tiền vào lại bảng hóa đơn và trừ lại số lượng tồn 
                $total += $item['thanhtien'];
                // update ngược lại bảng hàng hóa 
            }
            $hd->updateHoaDonThanhTien($sohd, $makh, $total);
            // $_SESSION['cart'][] = [];
        }

        include_once "./View/order.php";
        break;
}
?>