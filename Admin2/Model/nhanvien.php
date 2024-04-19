<?php
class nhanvien
{
    function getAdmin($user, $pass)
    {
        $db = new connect();
        $select = "SELECT username,matkhau from nhan_vien where username='$user' and matkhau='$pass'";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
    }
}
?>