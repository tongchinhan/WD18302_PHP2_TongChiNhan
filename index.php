<?php


require "Admin/Include/head.php";
$act = isset($_GET['act']) ? $_GET['act'] : 'home';

// Bao gồm header
require "Admin/Include/header.php";

switch ($act) {
    case 'home': {
        include "Admin/public/doc/index.php";
        break;
    }
    case 'danhsachtailieu': {
        include "Admin/public/doc/table-data-table.php";
        break;
    }
    case 'danhsachtheloai': {
        include 'Admin/public/doc/table-data-product.php';
        break;
    }
    case 'danhsachbinhluan': {
        include 'Admin/public/doc/table-data-oder.php';
        break;
    }
    case 'danhsachnguoidung': {
        include 'Admin/public/doc/danhsachnguoidung.php';
        break;
    }
    case 'danhsachdanhgia': {
        include 'Admin/public/doc/danhsachdanhgia.php';
        break;
    }
    // Các case khác nếu có
}


require 'Admin/Include/footer.php';