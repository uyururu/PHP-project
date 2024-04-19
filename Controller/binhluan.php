<?php

if (isset ($_POST['submit'])) {
    $makh = $_SESSION['IdKhachHang'];
    $masp = $_POST['txtmahh'];
    $content = $_POST['comment'];
    // thực hiện insert vào database 
    $bl = new binhluan();
    $bl->insertBinhLuan($makh, $masp, $content);
}
// include_once "./View/sanphamchitiet.php"
echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '"/>';

?>