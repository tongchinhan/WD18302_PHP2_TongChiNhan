<?php

namespace App\Controllers;

use App\Core\RenderBase;

class ThemTaiLieuController extends BaseController
{

    private $_renderBase;

    function __construct(\PDO $dbConnection)
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->ThemTaiLieuPageController();
    }
    
    function ThemTaiLieuPageController()
    {
        // Kiểm tra nếu dữ liệu được gửi đi từ form và lưu thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["saveDocument"])) {
            // Gọi hàm thêm tài liệu từ model hoặc repository của bạn
            // Nếu thêm thành công, thực hiện chuyển hướng người dùng về trang tài liệu
            if ($this->addDocument($_POST)) {
                header("Location: ?url=TaiLieuController"); // Chuyển hướng về trang tài liệu
                exit(); // Ngăn cản các mã PHP khác thực hiện sau đó
            }
        }
        
        // Nếu không phải là phương thức POST hoặc không phải là lưu thành công, hiển thị trang thêm tài liệu bình thường
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderHead();
        $this->load->render('layouts/doc/ThemTaiLieu');
        $this->_renderBase->renderFooter();
    }

    // Phương thức để thêm tài liệu
    function addDocument($documentData)
    {
        // Code xử lý thêm tài liệu từ model hoặc repository của bạn
    }

    function detail($id)
    {        // dữ liệu ở đây lấy từ responsitories hoặc model
        // $this->redirect('layouts/doc/table-data-product/' . $productId);
    }
}
