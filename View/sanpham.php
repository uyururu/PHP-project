<!-- end số lượt xem san phẩm -->
<!-- sản phẩm-->
<?php
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && ($_GET['act']) == 'sale') {
        // ============ quảng cáo ==============
        include_once "quangcao.php";
        // ============ end quảng cáo ==============
        $ac = 2;
    } else if (isset($_GET['act']) && ($_GET['act']) == 'timkiem') {
        $ac = 3;
    } else {
        $ac = 1;
    }
}
?>
<?php
// b1: xác định tổng số sản phẩm
$hh = new hanghoa();
$count = $hh->getHangHoaSaleAll()->rowCount(); //15
// b2: xác định limit
$limit = 4;
// b3:xác định được start số trang cần có 
$trang = new page();
$page = $trang->findPage($count, $limit); //4
// lấy start
$start = $trang->findStart($limit); //4
//lấy giá trị trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

?>
<!--Section: Examples-->
<section id="examples" class="text-center" style="padding-left:5rem; padding-right:5rem">

    <!-- Heading -->
    <!-- <div class="row">
        <div class="col-lg-8 text-right">

        </div>

    </div> -->
    <!--Grid row-->
    <div class="row">
        <?php
        $hh = new hanghoa();
        if ($ac == 2) {
            $result = $hh->getHangHoaAllPage($start, $limit);
        }
        if ($ac == 3) {
            if (isset($_POST['txtsearch'])) {
                $tk = $_POST['txtsearch'];
                // thực hiện lệnh truy vấn tìm kiếm 
                $result = $hh->selectTimKiem($tk);
            }
        }
        while ($set = $result->fetch()):
            ?>

            <div class="col-lg-6 col-md-3 mb-3 text-left">
                <!--Grid column-->
                <?php
                echo '<span style="font-size:5rem">'
                    . $set['Ten_loai'] .
                    '</span>'
                    ?>
                <div class="view overlay z-depth-1-half">
                    <img src="Content\img\<?php echo $set['Hinh'] ?>" class="img-fluid" alt=""
                        style="border: 1px solid #e5e7eb; border-radius: 2.5rem;">
                    <div class="mask rgba-white-slight"></div>
                </div>
                <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['IdSanPham'] ?>">
                    <span style="font-weight: 900;font-size:2.25rem; color: black">
                        <?php echo $set['Ten_Sp'] ?>
                    </span></br>
                </a>
                <span style="font-size:2rem">
                    <?php echo $set['mo_ta'] ?>
                </span>
                <?php
                // =======================================
                if ($ac == 3) {
                    echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($set['Gia']) . '<sup><u>đ</u></sup></br>';
                }
                // =======================================
                if ($ac == 2) {
                    echo '<h3 class="my-4 font-weight-light">
                            $' . ($set['Giam_gia']) . '
                            <font color="red">
                                Original Pirce $' . ($set['Gia']) .
                        '</font>
                            </h3>';
                }
                ?>
            </div>
            <?php
        endwhile;
        ?>
    </div>

    <!--Grid row-->

</section>


<!-- end sản phẩm mới nhất -->
<?php
if ($ac == 2):
    ?>
    <div class="col-md-12 col-md-offset-5">
        <ul class="pagination">
            <?php
            if ($current_page > 1 && $page > 1) {
                echo '<li>
                    <a href = " index.php?action=sanpham&act=sale&page=' . ($current_page - 1) . '">Prev
                    </a>
                </li>';
            }
            for ($i = 1; $i <= $page; $i++):
                ?>
                <li><a href="index.php?action=sanpham&act=sale&page=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a></li>
                <?php
            endfor;
            if ($current_page < $page && $page > 1) {
                echo '<li>
                <a href="index.php?action=sanpham&act=sale&page=' . ($current_page + 1) . '">Next
                </a>
            </li>';
            }
            ?>
        </ul>
    </div>
    <?php
endif;
?>