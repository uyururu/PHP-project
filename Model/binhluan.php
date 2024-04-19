<?php
class binhluan
{
    function insertBinhLuan($idkh, $idhanghoa, $content)
    {
        $db = new connect();
        $query = "INSERT INTO comment(idcomment,idkh,idhanghoa,content,luotthich)
        VALUES(NULL,$idkh,$idhanghoa,'$content',0)";
        echo $query;
        $db->exec($query);
    }
    // hiển thị nội dung bình luận 
    function selectComment($idmasp)
    {
        $db = new connect();
        $select = "SELECT b.username,a.content FROM comment a, khach_hang b 
        WHERE a.idkh = b.IdKhachHang  AND a.idhanghoa = $idmasp";
        $result = $db->getList($select);
        return $result;
    }
}
?>