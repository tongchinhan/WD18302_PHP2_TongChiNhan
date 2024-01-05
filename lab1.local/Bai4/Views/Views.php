<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    table {
        background-color: #fff;
        border-collapse: collapse;
        width: 1200px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    th, td {
        padding: 20px;
        text-align: left;
    }

    th {
        background-color: #4caf50;
        color: #fff;
        font-weight: bold;
        
    }

    td a.edit-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        cursor: pointer;
        border: none;
        outline: none;
    }

    td a.edit-btn:hover {
        background-color: #2980b9;
    }
</style>

</head>
<body>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Tài Liệu</th>
            <th>Ngày Gửi</th>
            <th>Ngày Nhận</th>
            <th>Nội Dung</th>
            <th>Người Soạn</th>
            <th>Người Nhận</th>
            <th>Trạng Thái</th>
            <th>Chỉnh Sửa</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($userData as $user): ?>
    <tr>
        <td><?= $user['id']; ?></td>
        <td><?= $user['tentailieu']; ?></td>
        <td><?= $user['ngaygui']; ?></td>
        <td><?= $user['ngaynhan']; ?></td>
        <td><?= $user['noidung']; ?></td>
        <td><?= $user['nguoisoan']; ?></td>
        <td><?= $user['nguoinhan']; ?></td>
        <td><?= $user['trangthai']; ?></td>
        <td>
            <!-- Thêm nút "Chỉnh sửa" với đường dẫn chuyển hướng đến trang chỉnh sửa -->
            <a href="edit_document.php?id=<?= $user['id']; ?>">Chỉnh sửa</a>
        </td>
    </tr>
<?php endforeach; ?>

    </tbody>
</table>

</body>
</html>
