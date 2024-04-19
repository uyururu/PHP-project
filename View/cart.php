<div class="table-responsive" style="padding: 0 2rem">
  <?php
  if (isset ($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

    ?>
    <form action="index.php?action=giohang&act=giohang_update" method="post">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td colspan="5">
              <h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2>
            </td>
          </tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $j = 1;
          foreach ($_SESSION['cart'] as $key => $item):
            ?>
            <tr>
              <td>
                <?php echo $j++; ?>
              </td>
              <td>
                <?php echo $item['tenhh'] ?>
              </td>
              <td><img width="50px" height="50px" src="./content/img/<?php echo $item['hinh'] ?>"></td>
              <td>Màu:
                <?php echo $item['mausac'] ?>
                <input type="hidden" value="<?php echo $item['idmau'] ?>">
              </td>
              <td>Đơn Giá: $
                <?php echo $item['dongia'] ?>
                -<br> Số Lượng:
                <div class="input-group mb-3">
                  <button class="btn btn-outline-secondary decrease" type="button" id="button-addon1">-</button>
                  <input class="form-control quantityField" type="number" id="soluong" name="newqty[<?php echo $key ?>]"
                    min="1" value="<?php echo $item['soluong'] ?>" max="<?php echo $item['hidden_soluong'] ?>" size="10"
                    readonly />
                  <button class="btn btn-outline-secondary increase" type="button" id="button-addon2">+</button>
                </div>
                <input type="number" name="default_quantity" value="<?php echo $item['hidden_soluong'] ?>" hidden>
                <br />
                <p style="float: right;"> Thành Tiền
                  <?php echo $item['thanhtien'] ?> $
                </p>
              </td>
              <td><a href="index.php?action=giohang&act=giohang_xoa&id=<?php echo $key; ?>">
                  <button type="button" class="btn btn-danger">Xóa</button></a>
              </td>
            </tr>
            <?php
          endforeach;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
                <?php
                $gh = new giohang();
                echo $gh->getTotal()
                  ?>
                $
              </b>
            </td>
            <td><a href="index.php?action=thanhtoan">Thanh toán</a></td>
            <td>
              <button type="submit" class="btn btn-secondary">Sửa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <?php
  } else {
    echo '<script>alert("Giỏ hàng của bạn chưa có hàng")</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
  }
  ?>

</div>
<script>
  document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('decrease')) {
      let quantityField = e.target.nextElementSibling;
      let currentValue = parseInt(quantityField.value);
      if (currentValue > 1) {
        quantityField.value = currentValue - 1;
      }
    }
    if (e.target && e.target.classList.contains('increase')) {
      let quantityField = e.target.previousElementSibling;
      let currentValue = parseInt(quantityField.value);
      let maxValue = parseInt(quantityField.getAttribute('max')); // Lấy giá trị tối đa từ thuộc tính max
      if (currentValue < maxValue) {
        quantityField.value = currentValue + 1;
      }
    }

  });
</script>