<section id="examples" class="text-center" style="padding-left:5rem; padding-right:5rem">
    <div class="row">
        <?php
        if (isset($_GET['act']) && isset($_GET['id'])) {
            $act = $_GET['act'];
            $id = $_GET['id'];
        }
        // echo $act;
        // echo $id;
        $hh = new menu();
        $result_cha = $hh->getAllHangHoaCha($id);
        $result_con = $hh->getAllHangHoaCon($act, $id);
        if ($act == 0) {
            while ($set = $result_cha->fetch()): ?>
                <div class="col-lg-6 col-md-3 mb-3 text-left">
                    <!--Grid column-->
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
                    <h3 class="my-4 font-weight-light">$
                        <?php echo ($set['Gia']) ?>
                    </h3>
                </div>
                <?php
            endwhile;
        } else {
            while ($set = $result_con->fetch()): ?>
                <div class="col-lg-6 col-md-3 mb-3 text-left">
                    <!--Grid column-->
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
                    <h3 class="my-4 font-weight-light">$
                        <?php echo ($set['Gia']) ?>
                    </h3>
                </div>
                <?php
            endwhile;
        }

        ?>
    </div>
</section>