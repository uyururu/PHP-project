<?php
class loai
{
    function getLoai()
    {
        $db = new connect();
        $select = "SELECT * from loai_sp";
        $result = $db->getList($select);
        return $result;
    }
}
?>