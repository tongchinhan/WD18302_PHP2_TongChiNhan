<?php

namespace App\Core;

class Route
{
    // Thuộc tính lưu trữ URL của request
    public $url;
    
    // Tên controller mặc định là "HomeController"
    public $nameController = "HomeController";
    
    // Tên method mặc định là "home"
    public $nameMethod = "home";
    
    // Đường dẫn đến thư mục chứa controllers
    public $path = 'App/Controllers/';
    
    // Đối tượng controller
    public $controller;

    // Hàm khởi tạo
    function __construct()
    {
        // Gọi các hàm xử lý request, controller, và method
        $this->request();
        $this->renderController();
        $this->renderMethod();
    }

    
    // Hàm xử lý request
    function request()
    {
        // Lấy URL từ biến $_GET
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;

        // Kiểm tra và làm sạch URL sử dụng filter_var
        if ($this->url != null) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }

    // Hàm xử lý controller
    function renderController()
    {
        if (!isset($this->url[0])) {
            // Nếu không có controller được chỉ định, sử dụng HomeController mặc định
            $className = $this->path . $this->nameController;
            $className = preg_replace("~\/~", "\\", $className);
            $this->controller = new $className;
            $this->controller->HomeController();
        } else {
            // Nếu có controller được chỉ định, kiểm tra và tạo đối tượng controller
            $this->nameController = $this->url[0];
            $file = __DIR__. '/../Controllers/'. $this->nameController . '.php';

            if (file_exists($file)) {
                require_once $file;
                $className = $this->path . $this->nameController;
                $className = preg_replace("~\/~", "\\", $className);
                
                // Kiểm tra xem class controller có tồn tại không
                if (class_exists($className)) {
                    $this->controller = new $className;
                } else {
                    // Nếu không tồn tại, chuyển hướng đến trang lỗi
                    header('Location:' . ROOT_URL . 'HomeController/Error');
                }
            } else {
                // Nếu không tìm thấy file controller, chuyển hướng đến trang lỗi
                header('Location:' . ROOT_URL . 'HomeController/Error');
            }
        }
    }

    // Hàm xử lý method
    function renderMethod()
    {
        if (isset($this->url[2])) {
            // Nếu có method được chỉ định, gọi method với tham số
            $this->nameMethod = $this->url[1];
            
            // Kiểm tra xem method có tồn tại không
            if (method_exists($this->controller, $this->nameMethod)) {
                $this->controller->{$this->nameMethod}($this->url[2]);
            } else {
                // Nếu không tồn tại, chuyển hướng đến trang lỗi
                header('Location:' . ROOT_URL . 'HomeController/Error');
            }
        } else {
            // Nếu không có method được chỉ định, kiểm tra và gọi method mặc định
            if (isset($this->url[1])) {
                $this->nameMethod = $this->url[1];
                
                // Kiểm tra xem method có tồn tại không
                if (method_exists($this->controller, $this->nameMethod)) {
                    $this->controller->{$this->nameMethod}();
                } else {
                    // Nếu không tồn tại, chuyển hướng đến trang lỗi
                    header('Location:' . ROOT_URL . 'HomeController/Error');
                }
            }
        }
    }
}
