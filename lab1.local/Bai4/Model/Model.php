<?php
// Model/MoDel.php

function get_all_users()
{
    include '../Config/config.php';

    $sql = "SELECT id, tentailieu, ngaygui, ngaynhan, noidung, nguoisoan,nguoinhan,trangthai FROM tailieu";
    $result = $connection->query($sql);

    if (!$result) {
        // Nếu có lỗi SQL, hiển thị thông báo và kết thúc hàm
        die("Error in SQL query: " . $connection->error);
    }

    $userData = array();

    while ($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }

    $result->free(); // Giải phóng bộ nhớ của kết quả
    $connection->close();

    return $userData;
}
