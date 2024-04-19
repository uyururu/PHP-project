<?php
class menu
{
    function getDanhMucCha($id)
    {
        $db = new connect();
        $select = "SELECT a.IdMenuCon,a.TenMenu,b.IdMenuCha FROM menu_con a ,menu_cha b
        WHERE b.IdMenuCha = a.idMenucha AND b.IdMenuCha = " . $id;
        $result = $db->getList($select);
        return $result;
    }
    function getAllHangHoaCha($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.IdSanPham,a.Ten_Sp,a.Hinh,a.mo_ta,d.Gia,c.IdMenucha
        FROM san_pham a, loai_sp b, menu_con c, chi_tiet_san_pham d
        WHERE a.Id_loai = b.Id_loai AND b.Ten_loai = c.TenMenu 
        And a.IdSanPham = d.IdSanpham AND c.idMenucha = " . $id;
        $result = $db->getList($select);
        return $result;
    }
    // function getTieuDeDanhMucCha($id)
    // {
    //     $db = new connect();
    //     $select = "SELECT b.Ten_loai
    //     FROM san_pham a, loai_sp b, menu_con c, chi_tiet_san_pham d
    //     WHERE a.Id_loai = b.Id_loai AND b.Ten_loai = c.TenMenu 
    //     And a.IdSanPham = d.IdSanpham AND c.idMenucha = " . $id . "
    //     GROUP BY b.Ten_loai";
    //     $result = $db->getInstance($select);
    //     return $result;
    // }
    // ======================================================================================================
    function getDanhMucCon($act, $id)
    {
        $db = new connect();
        $select = "SELECT a.IdMenuCon,a.TenMenu,b.IdMenuCha FROM menu_con a ,menu_cha b
        WHERE b.IdMenuCha = a.idMenucha AND b.IdMenuCha= " . $act . " AND a.IdMenuCon = " . $id;
        $result = $db->getList($select);
        return $result;
    }
    function getAllHangHoaCon($act, $id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.IdSanPham,a.Ten_Sp,a.Hinh,a.mo_ta,d.Gia,b.Ten_loai, c.IdMenuCon
        FROM san_pham a, loai_sp b, menu_con c,chi_tiet_san_pham d
        WHERE a.Id_loai = b.Id_loai AND b.Ten_loai = c.TenMenu 
        And a.IdSanPham = d.IdSanpham AND c.idMenucha = " . $act . " AND c.IdMenuCon = " . $id;
        $result = $db->getList($select);
        return $result;
    }
    // ======================================================================================
}
?>