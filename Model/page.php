<?php
class page
{
    // phuonng thức tính số trang 
    function findPage($count, $limit) //15,4
    {
        $page = (($count % $limit) == 0 ? $count / $limit : ceil($count / $limit));
        return $page;
    }
    // phương thức tìm start dựa vào trang hiện tại trên url 
    // thông qua 1 biến đặt tên là page
    function findStart($limit)
    {
        if (!isset($_GET['page']) || $_GET['page'] == 1) {
            $start = 0;
        } else {
            $start = ($_GET['page'] - 1) * $limit;
        }
        return $start;
    }
}
?>