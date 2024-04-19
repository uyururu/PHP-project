<?php
class hoadon
{
    // phương thức insert vào bảng hóa đơn trước ,
    // phải có hóa đơn mới có chi tiết hóa đơn 
    // bảng chi tiết hóa đơn sinh ra từ hóa dơn và khách hàng 
    function insertHoaDon($makh)
    {
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        // do trong database năm-tháng-ngày
        $db = new connect();
        $query = "INSERT INTO hoa_don(IdHoaDon,Ngay_Lap,Tong_Tien,IdKhachHang) VALUES(null,'$ngay',0,$makh)";
        $db->exec($query);
        // dạ insert xog 
        $select = "SELECT IdHoaDon from hoa_don ORDER BY IdHoaDon DESC limit 1";
        $mahd = $db->getInstance($select);
        return $mahd[0];
    }
    // phương thức chèn vào bảng chi tiết hóa đơn
    function insertCTHoaDon($masohd, $mahh, $soluongmua, $thanhtien, $mausac)
    {
        $db = new connect();
        $query = "INSERT INTO chi_tiet_hoa_don(IdHoaDon,IdSanPham,
        So_Luong,Thanh_Tien,Mau_sac,tinh_trang) values($masohd,$mahh,$soluongmua,$thanhtien,'$mausac',0)";
        // thực thi câu lệnh insert theo dạng tiêu chuẩn là exec,
        // còn dạng bảo mật là private (về tự viết lại)
        $db->exec($query);
    }
    // phương thức update thành tiền trong bảng hóa đơn 
    function updateHoaDonThanhTien($masohd, $makh, $total)
    {
        $db = new connect();
        $query = "UPDATE hoa_don 
        SET tong_tien = $total
        WHERE IdHoaDon = $masohd
        And IdKhachHang = $makh ";
        $db->exec($query);
    }
    // phương thức trừ lại tồn kho của món hàng đã mua 
    function updateHangHoaTon($id, $idmau, $soluong)
    {
        $db = new connect();
        $query = "UPDATE chi_tiet_san_pham 
        SET So_Luong = $soluong 
        WHERE IdSanPham = $id AND IdMau = $idmau";
        $db->exec($query);
    }
    function getHangTon($id, $idmau)
    {
        $db = new connect();
        $select = "SELECT a.So_Luong 
        FROM chi_tiet_san_pham a 
        WHERE a.IdSanPham = $id AND a.IdMau = $idmau";
        $result = $db->getList($select);
        return $result;
    }
    function getHoaDonKH($masohd)
    {
        $db = new connect();
        $select = "SELECT b.IdHoaDon, b.Ngay_Lap,a.username,a.diachi,a.sodienthoai
        FROM khach_hang a INNER JOIN hoa_don b
        ON a.IdKhachHang = b.IdKhachHang
        WHERE b.IdHoaDon = $masohd";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức hiển thị thông tin những món hàng đã mua trên hóa đơn 
    function getHoaDonCTHD($masohd)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.Ten_Sp,c.Mau_Sac,c.Thanh_Tien,c.So_Luong
        FROM san_pham a, chi_tiet_san_pham b, chi_tiet_hoa_don c
        WHERE a.IdSanPham = b.IdSanPham AND a.IdSanPham = c.IdSanPham
        AND c.IdHoaDon = $masohd";
        $result = $db->getList($select);
        return $result;
    }
}
?>