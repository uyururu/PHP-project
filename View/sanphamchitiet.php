<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }


</script>
<section class="w-100">
    <?php
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if (isset($_POST['id']) && isset($_POST['idmau'])) {
    //         $id = $_POST['id'];
    //         $idmau = $_POST['idmau'];
    //         // Nếu cả $id và $idmau đã được định nghĩa
    //         $hh1 = new hanghoa();
    //         $sp1 = $hh1->getHangHoaTon($id, $idmau);
    //         // Tiếp tục xử lý dữ liệu nhận được
    //         echo $sp1['soluong'];
    //     } else {
    //         echo "Thiếu thông tin id và idmau";
    //     }
    // } else {
    //     echo "Yêu cầu không hợp lệ";
    // }
    ?>
    <article class="col-12 d-flex justify-content-center">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="row">
                <form action="index.php?action=giohang&act=giohang_action" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-9" style="border-right: 1px solid #ddd;">
                        <div class="tab-content">
                            <?php
                            if (isset ($_GET['id'])) {
                                $id = $_GET['id']; // nhận được 21
                            
                                //View đòi hỏi là phải có thông tin của id =21 thì mới hiển thị 
                                $hh = new hanghoa();
                                $sp = $hh->getHangHoaId($id);
                                // vì dùng chung 1 object nên kko fetch $sp =array(mahh:21,tenhh:giày..)
                                $tenhh = $sp['Ten_Sp'];
                                $mota = $sp['mo_ta'];
                                $dongia = $sp['Gia'];
                                $chitiet = $sp['Chi_tiet'];
                                $soluong = $sp['So_Luong'];
                            }
                            ?>
                            <?php
                            $hinh = $hh->getHangHoaHinh($id);
                            $set = $hinh->fetch();
                            ?>
                            <div class="tab-pane active" id="">
                                <img src="Content\img\<?php echo $set['Hinh'] ?>" alt="" class="w-100 h-100">
                            </div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php
                            while ($set = $hinh->fetch()):
                                ?>
                                <li class="active"><a href="#<?php echo $set['Hinh']; ?>" data-toggle="tab">
                                        <img src="<?php echo 'Content/img/' . $set['Hinh']; ?>"
                                            alt="Học thiết kế web bán hàng Online"></a>
                                </li>
                                <?php
                            endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="details col-md-3 pt-5 pl-5">
                        <input type="hidden" name="mahh" value="<?php echo $id ?>" />
                        <h3 class="product-title" style="font-weight: 700;font-size:5rem; color: black;">
                            <?php echo $tenhh ?>
                        </h3>
                        <p class=" product-description text-left">
                            <?php echo $mota ?>
                        </p>

                        <?php if ($soluong <= 0) {
                            echo '
                            <h4 style="color: red; font-weight: 700;font-size:3rem;font-family: Nunito">
                            SOLD OUT!
                            </h4>';
                        } else {
                            echo '<h4 class="price" style="color: black; font-weight: 700;font-size:3rem;font-family: Nunito">
                            $' . $dongia . '
                        </h4>';
                        } ?>
                        <!-- <div class=" rating">
                            <div class="stars"> <span class="fa fa-star checked"></span> <span
                                    class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span> <span class="fa fa-star"></span>
                            </div>
                        </div> -->
                        <div class="pstar" data-pid="<?= $id ?>">
                            Your rating:
                            <?php
                            $rating = 0;
                            for ($i = 1; $i <= 5; $i++) {
                                $img = $i <= $rating ? "star" : "star-blank";
                                echo "<img src='Content/imagetourdien/$img.png' style='width:30px;cursor:pointer;' data-set='$i'>";
                            }
                            ?>
                        </div>


                        <h5 class="colors">Color: </br>
                            <select name="mymausac" id="id_work_days" multiple class="w-100">
                                <?php
                                $mau = $hh->getHangHoaMau($id);
                                while ($set = $mau->fetch()):
                                    ?>
                                    <option value="<?php echo $set['IdMau'] ?>"
                                        onclick="showHangTon(<?php echo $id ?>,<?php echo $set['IdMau'] ?>)">
                                        <?php echo $set['TenMau'] ?>
                                    </option>
                                    <?php
                                endwhile;
                                ?>
                            </select><br>
                        </h5>
                        <!-- <select name="mymausac" class="form-control" style="width:150px;"></select><br> -->
                        <h5>Quantity:
                            <?php if ($soluong > 0)
                                echo $soluong;
                            else
                                echo 0; ?>
                        </h5>
                        <input type="number" name="hidden_soluong" hidden value="<?php echo $soluong ?>">

                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary decrease" type="button"
                                id="button-addon1">-</button>
                            <input class="form-control quantityField" type="number" id="soluong" name="soluong" min="1"
                                max="<?php echo $soluong ?>" value="1" size="10" readonly />
                            <button class="btn btn-outline-secondary increase" type="button"
                                id="button-addon2">+</button>
                        </div>
                        <div class="action">
                            <?php if ($soluong > 0):
                                echo '<button class="add-to-cart btn btn-default" type="submit" data-toggle="modal"
                                data-target="#myModal">MUA NGAY
                            </button>';
                                ?>
                                <?php
                            endif; ?>
                            <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default"
                                    type="button"><span class="fa fa-heart"></span></button> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
</section>
<section class="row">
    <div class="col-md-9" style="border-right: 1px solid #ddd;">
        <span>
            Customer Reviews
        </span>
        <?php
        if (isset ($_SESSION['IdKhachHang'])):
            ?>

            <hr>
            <form action="index.php?action=binhluan" method="post">
                <div class="row">

                    <input type="hidden" name="txtmahh" value="<?php echo $id ?>" />
                    <img src="Content/imagetourdien/people.png" style="width:50px" />
                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment"
                        placeholder="Thêm bình luận">  </textarea>
                    <input type="submit" name="submit" class="btn btn-primary" id="submitButton" style="float: right;"
                        value="Bình Luận" />
                </div>
            </form>
            <?php
        endif;
        ?>
        <div class="row">
            <p class="float-left">
                <b>Các bình luận</b>
            </p>
            <?php
            $bl = new binhluan();
            $noidung = $bl->selectComment($id);
            while ($set = $noidung->fetch()):
                ?>
                <div class="col-12">
                    <div class="row">
                        <img src="Content/imagetourdien/people.png" style="width:50px">
                        <p>
                            <?php echo '<b>' . $set['username'] . '</b>' . $set['content']; ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
            <hr>
        </div>
    </div>
</section>

<script>
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('decrease')) {
            let quantityField = document.querySelector('.quantityField');
            let currentValue = parseInt(quantityField.value);
            if (currentValue > 1) {
                quantityField.value = currentValue - 1;
            }
        }
        if (e.target && e.target.classList.contains('increase')) {
            let quantityField = document.querySelector('.quantityField');
            let currentValue = parseInt(quantityField.value);
            let maxLimit = parseInt(quantityField.getAttribute('max'));
            if (currentValue < maxLimit) {
                quantityField.value = currentValue + 1;
            }
        }
    });

</script>
<script>
    function showHangTon(id, idmau) {
        $.ajax({
            type: 'GET',
            url: '/php2/Final_project/index.php?action=sanpham&act=sanphamchitiet&id=' + id,
            async: false,
            data: { IdSp: id, IdMauSp: idmau },
            success: function (response) {
                console.log(id); // Log the response to the console
                console.log("URL: " + this.url);
            },
            error: function (xhr, status, error) {
                console.log(error); // Ghi nhật ký lỗi ra console
            }
        });
    }
    var stars = {
        init: function () {
            for (let docket of document.getElementsByClassName("pstar"))//div bên ngoài
            {
                for (let star of document.getElementsByTagName("img")) // duyệt qua ngôi showHangTon
                {
                    star.addEventListener("click", stars.click);
                }
            }
        },
        click: function () {
            // lấy ra 5 ngôi sao
            let all = this.parentElement.getElementsByTagName("img"),//5 ngôi sao 
                set = this.dataset.set,//3
                u = 1;
            for (let star of all) {
                star.src = i <= set ? "star.png" : "star-blank.png";
            }
            // gắn những giá trị người dùng đánh giá vào thẻ input trong form hidden
            document.getElementById("ninPdt").value = this.parentElement.dataset.pid;
            document.getElementById("ninStar").value = this.dataset.set;
            document.getElementById("ninForm_2").submit();
        }
    }
    window.addEventListener("DOMContentLoaded", stars.init);
</script>