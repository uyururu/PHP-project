<?php
$hh = new menu();
$act = "dieuhuong_page";
if (isset($_GET['act']) && isset($_GET['id'])) {
    $act = $_GET['act'];
    $id = $_GET['id'];
}
$DM_con = $hh->getDanhMucCon($act, $id);
$DM_cha = $hh->getDanhMucCha($id);
// while ($get = $DM_con->fetch()) {
//     echo ($get['TenMenu']);
//     echo ($get['IdMenuCon']);
// }
// while ($set = $DM_cha->fetch()) {
//     echo ($set['TenMenu']);
//     echo ($set['IdMenuCon']);
// }
if ($id == 1) {
    include_once "./View/home.php";
} else {
    include_once "./View/danhmuc.php";
}
?>