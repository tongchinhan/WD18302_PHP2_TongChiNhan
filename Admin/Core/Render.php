<?php

namespace Msifpt\Wd18302Php2TongChiNhan\Core;


use Exception;

class Render
{
    // Hàm khởi tạo không cần nội dung đặc biệt
    public function __construct()
    {
    }

    /**
     * Hàm render dùng để gọi các trang trong Views
     *
     * @param  string $file
     * @param  array $data
     * @throws Exception Nếu không tìm thấy view
     * @return void
     */
    public function render($file, $data = array())
    {
        // Tạo các biến từ mảng dữ liệu
        extract($data);

        // Xác định đường dẫn đến file view
        $viewPath = __DIR__ . '/../Views/' . $file . '.php';

        // Kiểm tra xem file view có tồn tại không
        if (!file_exists($viewPath)) {
            throw new Exception('Không tìm thấy view');
        }

        // Tải file view
        require $viewPath;
    }

    /**
     * Hàm renderModel dùng để gọi file model trong Models
     *
     * @param  string $file
     * @return object
     */
    public function renderModel($file)
    {
        // Xác định đường dẫn đến file model
        $modelPath = __DIR__ . '/../Models/' . $file . '.php';

        // Kiểm tra xem file model có tồn tại không
        if (!file_exists($modelPath)) {
            throw new Exception('Không tìm thấy model');
        }

        // Tải file model và trả về đối tượng mới
        require $modelPath;
        return new $file();
    }
}
