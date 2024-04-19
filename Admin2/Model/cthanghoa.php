<?php
class cthanghoa
{
    function insertCTHangHoa($mahh, $mamau, $dongia, $giamgia, $slt, $chitiet, $hinh)
    {
        $db = new connect();
        $query = "INSERT INTO chi_tiet_san_pham(IdSanPham,IdMau,Gia,Giam_gia,So_Luong,Chi_tiet,hinh) 
            values ($mahh,$mamau,$dongia,$giamgia,$slt,'$chitiet','$hinh')";
        echo $query;
        $result = $db->exec($query);
        return $result;
    }
}
?>