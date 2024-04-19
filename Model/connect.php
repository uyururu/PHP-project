<?php
class connect
{
    // thuộc tính
    var $db = null;
    // hàm tạo được gọi khi tạo 1 đối tượng
    function __construct()
    {

        $dsn = 'mysql:host=localhost;dbname=data_hyte';
        $user = 'root';
        $pass = 123456789; // Nếu xài mammp $pass = 'root'
        // tạo đối tượng từ class PDO
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => " SET NAMES utf8"));
            // echo "Kết nối thành công";
        } catch (\Throwable $th) {
            // throw $th;
            echo "Kết nối thành công";
            echo $th;
        }
    }
    function getList($select)
    {
        $result = $this->db->query($select); //$result= $this -> db ->query(select * from);
        return $result; // 1 table là 1 array lớn
    }
    // phương thức trả về 1 row
    function getInstance($select)
    {
        $results = $this->db->query($select); // $result= $this -> db ->query(select * from ... where);
        $result = $results->fetch(); // result là 1 array của 1 dòng
        return $result;
    }
    // phương thức thực hiện truy vấn insert, update, deleted
    function exec($query)
    {
        $result = $this->db->exec($query);
        return $result;
    }
    // phương thức prepare
    function execP($query)
    {
        $statement = $this->db->prepare($query);
        return $statement;
    }

}
?>