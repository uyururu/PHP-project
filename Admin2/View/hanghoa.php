<div class="col-md-4 col-md-offset-4">
  <h3><b>DANH SÁCH HÀNG HÓA</b></h3>
</div>
<div class="row col-12">
  <a href="index.php?action=hanghoa&act=hanghoa_action">
    <h4>Thêm sản phẩm</h4>
  </a>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Hình</th>
        <th>Mã loại</th>
        <th>Mô tả</th>
        <th>Ngày lập</th>
        <th>Đặc biệt</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hh = new hanghoa();
      $hang = $hh->getHangHoa();
      while ($set = $hang->fetch()):
        ?>
        <tr>
          <td>
            <?php echo $set['IdSanPham']; ?>
          </td>
          <td>
            <?php echo $set['Ten_Sp']; ?>
          </td>
          <td>
            <img src="./Content/img/<?php echo $set['Hinh'] ?>" alt="" width="100" height="75">
          </td>
          <td>
            <?php echo $set['Id_loai']; ?>
          </td>
          <td>
            <?php echo $set['mo_ta']; ?>
          </td>
          <td>
            <?php echo $set['ngay_lap']; ?>
          </td>
          <td>
            <?php echo $set['special']; ?>
          </td>
          <td><a href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['IdSanPham']; ?>">Cập nhật</a></td>
          <td><a href="">Xóa</a></td>
        </tr>
        <?php
      endwhile;
      ?>
    </tbody>
  </table>
</div>