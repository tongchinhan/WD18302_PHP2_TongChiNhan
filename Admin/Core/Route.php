<?php

namespace Msifpt\Wd18302Php2TongChiNhan\Core;



class Route
{
    // Khai báo các thuộc tính của đối tượng Route
    public $url;  // Đường dẫn URL được truyền từ yêu cầu
    public $nameController = "HomeController";  // Tên của Controller mặc định là "HomeController"
    public $nameMethod = "home";  // Tên của method mặc định là "home"
    public $path = 'App/Controllers/';  // Đường dẫn của thư mục chứa các Controllers
    public $controller;  // Đối tượng Controller

    // Hàm khởi tạo của đối tượng Route
    function __construct()
    {
        $this->request();  // Gọi hàm request để xử lý đường dẫn URL
        $this->renderController();  // Gọi hàm renderController để tạo đối tượng Controller
        $this->renderMethod();  // Gọi hàm renderMethod để gọi method của Controller
    }

    // Hàm xử lý đường dẫn URL
    function request()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;  // Lấy đường dẫn URL từ yêu cầu

        // Sử dụng filter_var để loại bỏ các ký tự không hợp lệ trong đường dẫn
        if ($this->url != null) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);  // Nếu không có đường dẫn, hủy bỏ biến $url
        }
    }

    // Hàm tạo đối tượng Controller
    function renderController()
    {
        if (!isset($this->url[0])) {
            // Nếu không có đường dẫn cụ thể, sử dụng Controller mặc định
            $className = $this->path . $this->nameController;
            $className = preg_replace("~\/~", "\\", $className);
            $this->controller = new $className;
            $this->controller->HomeController();
        } else {
            // Nếu có đường dẫn cụ thể, kiểm tra và tạo đối tượng Controller tương ứng
            $this->nameController = $this->url[0];
            $file = __DIR__. '/../Controllers/'. $this->nameController . '.php';

            if (file_exists($file)) {
                require_once $file;
                $className = $this->path . $this->nameController;
                $className = preg_replace("~\/~", "\\", $className);
                if (class_exists($className)) {
                    $this->controller = new $className;
                } else {
                    // Nếu Controller không tồn tại, chuyển hướng đến trang lỗi
                    header('Location:' . ROOT_URL . 'HomeController/Error');
                }
            } else {
                // Nếu file Controller không tồn tại, chuyển hướng đến trang lỗi
                header('Location:' . ROOT_URL . 'HomeController/Error');
            }
        }
    }

    // Hàm gọi method của Controller
    function renderMethod()
    {
        if (isset($this->url[2])) {
            // Nếu có đối số thứ 3, gọi method với đối số
            $this->nameMethod = $this->url[1];
            if (method_exists($this->controller, $this->nameMethod)) {
                $this->controller->{$this->nameMethod}($this->url[2]);
            } else {
                // Nếu method không tồn tại, chuyển hướng đến trang lỗi
                header('Location:' . ROOT_URL . 'HomeController/Error');
            }
        } else {
            if (isset($this->url[1])) {
                // Nếu có đối số thứ 2, gọi method mà không có đối số
                $this->nameMethod = $this->url[1];
                if (method_exists($this->controller, $this->nameMethod)) {
                    $this->controller->{$this->nameMethod}();
                } else {
                    // Nếu method không tồn tại, chuyển hướng đến trang lỗi
                    header('Location:' . ROOT_URL . 'HomeController/Error');
                }
            }
        }
    }
}
