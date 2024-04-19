<?php
class user
{
    // phương thức kiểm tra user và email có tồn tại hay không 
    function getCheckUser($username, $email)
    {
        $db = new connect();
        $select = "SELECT a.username,a.email FROM khach_hang a WHERE a.username = '$username' or a.email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    // phương thức insert và database 
    function insertKhachHang($username, $matkhau, $email, $diachi, $sodienthoai)
    {
        $db = new connect();
        $query = "INSERT INTO khach_hang (IdKhachHang,username,matkhau,email,diachi,sodienthoai)
        VALUES (NULL,'$username','$matkhau','$email','$diachi','$sodienthoai')";
        // exec
        $result = $db->exec($query);
        return $result;

    }
    // phương thức login 
    function logKhahHang($user, $pass)
    {
        $db = new connect();
        $select = "SELECT a.IdKhachHang, a.username FROM khach_hang a WHERE a.username = '$user' AND a.matkhau = '$pass'";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức update pass
    function getPassNew($email, $pass)
    {
        $db = new connect();
        $query = "UPDATE khach_hang SET matkhau = '$pass' WHERE email='$email'";
        $db->exec($query);
        // $result = $db->exec($query);
        // return $result;
    }
    function getEmail($email)
    {
        $db = new connect();
        $select = "SELECT * from khach_hang where email = '$email'";
        //    echo $select;
        $result = $db->getList($select);
        return $result;
    }
}
?>