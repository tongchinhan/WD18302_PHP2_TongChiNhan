<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\NguoiDungModel;
use App\Models\TaiLieuModel;

class SuaNguoiDungController extends BaseController
{
    private $_renderBase;
    private $nguoiDungModel;
    private $dbConnection;

    function __construct(\PDO $dbConnection)
    {
        parent::__construct();
        $this->dbConnection = $dbConnection;
        $this->_renderBase = new RenderBase();
        $this->nguoiDungModel = new NguoiDungModel($this->dbConnection);
        $this->SuaNguoiDungController();
    }

    function SuaNguoiDungController()
    {
        // Kiểm tra nếu dữ liệu được gửi đi từ form và lưu thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["saveDocument"])) {
            // Gọi hàm cập nhật tài liệu từ model hoặc repository của bạn
            // Nếu cập nhật thành công, thực hiện chuyển hướng người dùng về trang tài liệu
            if ($this->updateUss($_POST)) {
                header("Location: ?url=NguoiDungController"); // Chuyển hướng về trang tài liệu
                exit(); // Ngăn cản các mã PHP khác thực hiện sau đó
            }
        }

        // Kiểm tra nếu có id được truyền vào từ URL
        if (isset($_GET['idnguoidung'])) {
            // Truy xuất thông tin của tài liệu cần sửa từ cơ sở dữ liệu
            $documentId = $_GET['idnguoidung']; // Sửa thành $_GET['id']
            $documentInfo = $this->nguoiDungModel->getUsertById($documentId);

            // Kiểm tra nếu tài liệu tồn tại
            if ($documentInfo) {
                // Nếu có tài liệu, hiển thị trang sửa tài liệu với thông tin tài liệu cũ
                $this->_renderBase->renderHeader();
                $this->_renderBase->renderHead();
                $this->load->render('layouts/doc/SuaNguoiDung', ['documentInfo' => $documentInfo]);
                $this->_renderBase->renderFooter();
                return; // Dừng xử lý tiếp theo
            }
        }

        // Nếu không phải là phương thức POST hoặc không phải là cập nhật thành công, hiển thị trang sửa tài liệu bình thường
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderHead();
        $this->load->render('layouts/doc/SuaNguoiDung');
        $this->_renderBase->renderFooter();
    }


    // Phương thức để cập nhật tài liệu
    function updateUss($documentData)
    {
        // Gọi phương thức cập nhật tài liệu từ model
        return $this->nguoiDungModel->updateUs($documentData);
    }

    function detail($id)
    {
        // Dùng để hiển thị chi tiết tài liệu, bạn có thể viết logic cho phần này tương tự như phương thức tạo controller cho trang chi tiết tài liệu
    }
}
