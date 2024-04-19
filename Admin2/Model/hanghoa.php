<?php
class hanghoa
{
    function getHangHoa()
    {
        $db = new connect();
        $select = "SELECT * from san_pham";
        $result = $db->getList($select);
        return $result;
    }
    // pt thêm
    function insertHangHoa($tenhh, $maloai, $mota, $ngaylap, $dacbiet)
    {
        $db = new connect();
        $query = "INSERT INTO san_pham(IdSanPham,Ten_Sp,Id_loai,mo_ta,ngay_lap,special) 
        values (Null,'$tenhh', $maloai, '$mota', '$ngaylap', $dacbiet)";
        $result = $db->exec($query);
        return $result;
    }
    // phương thức lấy thông tin 1 món hàng
    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "SELECT * from san_pham where IdSanPham=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức update
    function updateHangHoa($mahh, $tenhh, $maloai, $mota, $ngaylap, $dacbiet)
    {
        $db = new connect();
        $query = "UPDATE san_pham 
        set Ten_Sp='$tenhh', Id_loai=$maloai,special=$dacbiet,ngay_lap='$ngaylap',mo_ta='$mota' 
        where IdSanPham=$mahh";
        $result = $db->exec($query);
        return $result;
    }
    function getMau()
    {
        $db = new connect();
        $select = "SELECT * from mau_sp";
        $result = $db->getList($select);
        return $result;
    }
    // function getSize()
    // {
    //     $db = new connect();
    //     $select = "select * from sizegiay";
    //     $result = $db->getList($select);
    //     return $result;
    // }
    function getThongKe()
    {
        $db = new connect();
        $select = "SELECT b.Ten_Sp,sum(a.So_Luong) 
        as soluong 
        from chi_tiet_hoa_don a, san_pham b
        WHERE a.IdSanPham=b.IdSanPham group by b.Ten_Sp";
        $result = $db->getList($select);
        return $result;
    }
}
?>