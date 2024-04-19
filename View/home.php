<!-- hinh dộng -->
<style>
    img {
        max-width: 100%;
        /* Hình ảnh sẽ không chạm quá kích thước của vùng chứa */
        height: auto;
        /* Giữ nguyên tỉ lệ chiều cao khi thay đổi kích thước */
        max-height: none;
        /* Đảm bảo rằng chiều cao có thể vượt quá kích thước tối đa */
    }
</style>
<div class="row p-0" style="width:100%">
    <a href="index.php?action=sanpham&act=sale" style="width:100%" class="p-0">
        <div class="col-12" style="width:100%;padding: 0">
            <img class="d-block w-100" src="./Content/img/promote.webp" alt="Third slide" style="height: 600px;background-repeat: no-repeat;background-position: center;object-fit: cover;
                width:100%">
        </div>
    </a>
</div>
<div style="width:100%">
    <?php
    $hh = new hanghoa();
    $result = $hh->getHangHoaSpecial();
    while ($set = $result->fetch()):
        ?>
        <div style="position: relative;width:100%">
            <div style="position: absolute; width:100%" class="inner-content">
                <div style="text-align: center;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative; z-index:1; top:0">
                    <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['IdSanPham'] ?>">
                        <span style="font-size: 38px;font-weight:600;color:#000;width:100%">
                            <?php echo $set['Ten_Sp'] ?>
                        </span>
                    </a>
                    </br>
                    <span style="font-size: 38px;font-weight:100;color:#000">
                        <?php echo $set['mo_ta'] ?>
                    </span></br>
                    <div>
                        <button class="btn btn-primary" style="border-radius: 30px;border:none; font-family:sans-serif;
                    font-size: 15px;font-weight: 800; padding:0.25rem 2.25rem">
                            <b>VISIT STORE</b>
                        </button>
                        <button class="btn"
                            style="border-radius: 30px;border:none; font-family:sans-serif;
                    font-size: 15px;font-weight: 800; padding:0.25rem 2.25rem; border: 1px solid #0d6efd; color:#0d6efd">
                            <b>VISIT STORE</b>
                        </button>
                    </div>
                </div>
            </div>
            <div class="">
                <img src="./Content/img/<?php echo $set['Hinh']; ?>" style="
  width: auto; 
  height: 100%; 
  object-fit: contain; ">
            </div>
        </div>
        <?php
    endwhile;
    ?>
</div>


</section>
<!-- end sản phẩm khuyến mãi -->