<?php
class hanghoa
{
    // thuộc tính
// hàm tạo 
// phương thức lấy ra 8 sản phẩm mới nhất
    function getHangHoaNew()
    {
        // b1: kết nối được database
        $db = new connect();
        // b2: Cần lấy cái gì, truy vấn cái đó 
        $select = "select a.IdSanPham,a.Ten_Sp,a.Hinh from san_pham a order by a.IdSanPham DESC limit 8;";
        // b3: Ai thực thi câu lệnh select? query, mà quer đang trong quá trình connect
        $result = $db->getList($select);
        return $result; //dữ liệu đc lấy từ database về
    }
    // phương thức lấy những sản phẩm giảm giá, giảm giá có giảm là 0

    // ===============================================================
    function getAllHangHoaNew()
    {
        // b1: kết nối được database
        $db = new connect();
        // b2: Cần lấy cái gì, truy vấn cái đó 
        $select = "SELECT a.IdSanPham,a.Ten_Sp,a.Hinh from san_pham a;";
        // b3: Ai thực thi câu lệnh select? query, mà quer đang trong quá trình connect
        $result = $db->getList($select);
        return $result; //dữ liệu đc lấy từ database về
    }
    // ===============================================================
    function getHangHoaSpecial()
    {
        $db = new connect();
        $select = "select a.IdSanPham,a.Ten_Sp,a.Hinh,a.mo_ta,a.special from san_pham a WHERE a.special = 1";
        $result = $db->getList($select);
        return $result;
    }

    // ===============================================================
    function getHangHoaSaleAll()
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.IdSanPham,b.IdSanPham,a.Ten_Sp,a.Hinh,a.mo_ta,b.Gia,b.Giam_gia,c.Ten_loai
        FROM san_pham a, chi_tiet_san_pham b,loai_sp c
        WHERE a.IdSanPham = b.IdSanPham AND b.Giam_gia!=0 AND a.Id_loai = c.Id_loai  ";
        $result = $db->getList($select);
        return $result;
    }
    // ===============================================================
    function getHangHoaAllPage($start, $limit)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.IdSanPham,b.IdSanPham,a.Ten_Sp,a.Hinh,a.mo_ta,b.Gia,b.Giam_gia,c.Ten_loai
        FROM san_pham a, chi_tiet_san_pham b,loai_sp c
        WHERE a.IdSanPham = b.IdSanPham AND b.Giam_gia!=0 AND a.Id_loai = c.Id_loai  
        ORDER BY a.IdSanPham ASC limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    // ===============================================================
    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT b.IdSanPham,b.Ten_Sp,b.mo_ta,a.Gia,a.Chi_tiet,a.So_Luong
        FROM chi_tiet_san_pham a, san_pham b 
        WHERE a.IdSanPham=b.IdSanPham and b.IdSanPham = " . $id;
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaHinh($id)
    {
        $db = new connect();
        $select = "SELECT a.Hinh from chi_tiet_san_pham a where a.IdSanPham = " . $id;
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaMau($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT b.IdMau,b.TenMau FROM chi_tiet_san_pham a,mau_sp b WHERE a.IdMau = b.IdMau and a.IdSanPham = " . $id;
        $result = $db->getList($select);
        return $result;
    }
    // ===============================================================
    function getHangHoaSoLuongTon($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT b.IdMau,b.TenMau FROM chi_tiet_san_pham a,mau_sp b WHERE a.IdMau = b.IdMau and a.IdSanPham = " . $id;
        $result = $db->getList($select);
        return $result;
    }
    // ===============================================================
    function getHangHoaMenuCha()
    {
        $db = new connect();
        $select = "SELECT a.IdMenuCha,a.TenMenu FROM menu_cha a ";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaMenuCon()
    {
        $db = new connect();
        $select = "SELECT * FROM menu_con b";
        $result = $db->getList($select);
        return $result;
    }
    function testGetNumberValueOfMenu()
    {
        $db = new connect();
        $select = "SELECT COUNT(DISTINCT a.IdMenuCha) AS menucha, 
        COUNT(DISTINCT b.id) AS menucon 
        FROM menu_cha a LEFT JOIN menu_child b ON a.IdMenuCha = b.id_menu_cha";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaMenuChild()
    {
        $db = new connect();
        $select = "SELECT * FROM menu_child ";
        $result = $db->getList($select);
        return $result;
    }
    // ==============================================================
    function getHangHoaIdCart($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT * FROM chi_tiet_san_pham a, san_pham b WHERE a.IdSanPham=b.IdSanPham and b.IdSanPham = " . $id;
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaHinhMau($mahh, $mausac)
    {
        $db = new connect();
        $select = "SELECT DISTINCT * FROM chi_tiet_san_pham a, san_pham b,mau_sp c 
        WHERE a.IdSanPham=b.IdSanPham 
        AND a.IdMau = c.IdMau 
        AND b.IdSanPham = " . $mahh . " 
        AND a.IdMau =" . $mausac;
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaMauSacId($id)
    {
        $db = new connect();
        //b2: can lay cai gi thi viet cau lenh select cai do
        $select = "SELECT DISTINCT a.TenMau,a.IdMau from mau_sp a WHERE a.IdMau=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    // ===========================================================================
    function getHangHoaTon($id, $IdMau)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.IdSanPham,a.IdMau,a.So_Luong,b.Ten_Sp 
        FROM chi_tiet_san_pham a, san_pham b 
        WHERE a.IdSanPham=b.IdSanPham and b.IdSanPham = $id AND a.IdMau = $IdMau";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTimKiem($tk)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.IdSanPham,b.IdSanPham,a.Ten_Sp,a.Hinh,a.mo_ta,b.Gia,b.Giam_gia,c.Ten_loai
        FROM san_pham a, chi_tiet_san_pham b,loai_sp c
        WHERE a.IdSanPham = b.IdSanPham AND b.Giam_gia!=0 AND a.Id_loai = c.Id_loai
        AND a.Ten_Sp like '%$tk%' ORDER BY a.IdSanPham DESC ";
        $result = $db->getList($select);
        return $result;
    }
    function getFilterAll()
    {
        $db = new connect();
        $select = "SELECT DISTINCT b.Ten_loai, b.Id_loai
        from san_pham a, loai_sp b
        WHERE a.Id_loai = b.Id_loai;";
        $result = $db->getList($select);
        return $result;
    }
}
?>