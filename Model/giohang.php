<?php
class giohang
{
    function addGioHang($mahh, $mausac, $soluong, $hidden_soluong)
    {
        $sanpham = new hanghoa();
        $sp = $sanpham->getHangHoaIdCart($mahh);
        $tenhh = $sp['Ten_Sp'];
        $dongia = $sp['Gia'];
        $hinh = $sanpham->getHangHoaHinhMau($mahh, $mausac);
        $img = $hinh['Hinh'];
        $mau = $sanpham->getHangHoaMauSacId($mausac);
        $tenmau = $mau['TenMau'];
        $idmau = $mau['IdMau'];
        $total = $soluong * $dongia;
        $flag = false;
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['mahh'] == $mahh) {
                $flag = true;
                $soluong = $soluong + $item['soluong'];
                $this->updateGioHang($key, $soluong); //giohang::updateGioHang...
            }
        }
        if ($flag == false) {
            $item = array(
                'mahh' => $mahh,
                'tenhh' => $tenhh,
                'hinh' => $img,
                'mausac' => $tenmau,
                'idmau' => $idmau,
                'soluong' => $soluong,
                'dongia' => $dongia,
                'thanhtien' => $total,
                'hidden_soluong' => $hidden_soluong,
            );
            $_SESSION['cart'][] = $item;
        }
        // return $_SESSION['cart'];
    }
    function updateGioHang($index, $soluong)
    {
        if ($soluong < 0) {
            unset($_SESSION['cart'][$index]);
        } else {
            //update la phep gan
            $_SESSION['cart'][$index]['soluong'] = $soluong;
            $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
            // $db = new connect();
            // $select = "";
        }
    }
    function getTotal()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['thanhtien'];
        }
        return number_format($subtotal, 2);
    }
}
?>