<style>
    .navbar {
        background-color: #fff !important;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        /* Box-shadow với độ bóng đổ 2px dọc theo trục y */
    }


    li .dropdown-item {
        position: relative;
        font-size: 1.5em;
        color: #000;
        text-decoration: none;
        font-weight: 400;
        /* margin-left: 40px; */
    }

    li .dropdown-item:hover {
        color: black;
    }

    li .dropdown-item::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -4px;
        width: 100%;
        height: 3px;
        background: #000;
        border-radius: 5px;
        transform-origin: right;
        transform: scaleX(0);
        transition: transform .5s;
    }

    li .dropdown-item:hover::after {
        transform-origin: left;
        transform: scaleX(1);
    }
</style>
<?php
$hh = new hanghoa();
$menu_con = $hh->getHangHoaMenuCon();
$arr = [];
while ($row = $menu_con->fetch()) {
    $arr[$row['IdMenuCon']]['TenMenu'] = $row['TenMenu'];
    $arr[$row['IdMenuCon']]['idMenucha'] = $row['idMenucha'];
}
// $html .= '<li><a class="nav-link dropdown-toggle" href="index.php?action=sanpham&act=' . $data['TenMenu'] . '" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $data['TenMenu'] . '</a>';

$html = '';
function buildTreeView($arr, $parent, $level = 0, $prelevel = -1)
{
    global $html;
    foreach ($arr as $id => $data) {
        if ($parent == $data['idMenucha']) {
            if ($level > $prelevel) {
                if ($html == '') {
                    $html .= '<ul class="nav navbar-nav w-100 justify-content-between">';
                } else {
                    $html .= '<ul class="dropdown-menu" style="  position: absolute;z-index: 100;">';
                }

            }
            if ($level == $prelevel) {
                $html .= '</li>';
            }
            $html .= '<li><a class="dropdown-item" href="index.php?action=dieuhuong_page&act=' . $parent . '&id=' . $id . '" style="color:#000">' . $data['TenMenu'] . '</a>';
            if ($level > $prelevel) {
                $prelevel = $level;
            }
            $level++;
            buildTreeView($arr, $id, $level, $prelevel);
            $level--;
        }
    }
    if ($level == $prelevel) {
        $html .= '</li></ul>';
    }
    return $html;
}
?>
<nav class="navbar navbar-expand-xl p-0 m-0" style="height: 13vh;position: fixed;z-index:999;top:0;min-height: 70px">
    <div class="container-fluid p-0">
        <a class="d-flex justify-content-center" href="index.php?action=home" style="width: 10%;">
            <img src="./Content/img/brand.webp" height="40" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation" style="order:3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end d-flex flex-xl-row justify-content-between" tabindex="-1"
            id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <?php
            echo buildTreeView($arr, 0);
            ?>
        </div>
        <div class="" style="order:1">
            <?php
            if (!isset ($_SESSION['IdKhachHang'])) {
                include_once "./View/form.php";
            } else {
                echo '<ul class="nav navbar-nav" style="flex-direction:row; justify-content:center; align-items:center">
                    <li>
                        <p style="color: red;padding:0;margin:0">' . $_SESSION['username'] . '</p>
                    </li>
                    <li>
                        <a href="index.php?action=dangnhap&act=dangxuat">
                        Dang xuat
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                        </svg>
                        </a>
                    </li>
                </ul>';
            }
            ;
            ?>
        </div>
        <div style="order:1; width: 10%;" class="d-flex justify-content-center">
            <a href="index.php?action=giohang">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
            </a>
        </div>
</nav>

<!-- dang ky -->