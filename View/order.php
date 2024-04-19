<div class="table-responsive" style="padding: 0 2rem">
  <?php
  if (!$_SESSION['IdKhachHang'] || count($_SESSION['cart']) < 1):
    echo '<script>alert("Bạn chưa đăng nhập")</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
  else:
    ?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">
        <?php
        if (isset($_SESSION['IdKhachHang']) && isset($_SESSION['IdHoaDon'])) {
          $hd = new hoadon();
          $hduser = $hd->getHoaDonKH($_SESSION['IdHoaDon']);
          $sohd = $hduser['IdHoaDon'];
          $tenkh = $hduser['username'];
          $ngay = $hduser['Ngay_Lap'];
          $diachi = $hduser['diachi'];
          $sodienthoai = $hduser['sodienthoai'];
          ?>
          <tr>
            <td colspan="4">
              <h2 style="color: red;">HÓA ĐƠN</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2">Số Hóa đơn:
              <?php echo $sohd ?>
            </td>
            <td colspan="2"> Ngày lập:
              <?php echo $ngay ?>
            </td>
          </tr>
          <tr>
            <td colspan="2">Họ và tên:
              <?php echo $tenkh ?>
            </td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2">Địa chỉ:
              <?php echo $diachi ?>
            </td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2">Số điện thoại:
              <?php echo $sodienthoai ?>
            </td>
            <td colspan="2"></td>
          </tr>
        <?php }
        ?>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_SESSION['IdKhachHang']) && isset($_SESSION['IdHoaDon'])) {
            $hd = new hoadon();
            $kq = $hd->getHoaDonCTHD($_SESSION['IdHoaDon']);
            $i = 0;
            while ($set = $kq->fetch()):
              $i++
                ?>
              <tr>
                <td>
                  <?php echo $i ?>
                </td>
                <td>
                  <?php echo $set['Ten_Sp'] ?>
                </td>
                <td>Màu:
                  <?php echo $set['Mau_Sac'] ?>
                </td>
                <td>Đơn Giá:
                  <?php echo number_format($set['Thanh_Tien']) ?>
                  - Số Lượng:
                  <?php echo $set['So_Luong'] ?><br />
                </td>
              </tr>
              <?php
            endwhile;
          }
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
                <?php
                $gh = new giohang();
                echo $gh->getTotal();
                ?><sup><u>đ</u></sup>
              </b>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <?php
  endif;
  ?>
</div>
</div>