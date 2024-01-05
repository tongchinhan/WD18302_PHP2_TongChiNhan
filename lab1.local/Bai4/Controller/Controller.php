<?php
include '../Model/MoDel.php';

// Gọi hàm để lấy dữ liệu từ cơ sở dữ liệu
$userData = get_all_users();

// Include file HTML hiển thị
include '../Views/views.php';
?>
