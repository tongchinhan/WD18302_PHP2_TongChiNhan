<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\NguoiDungModel;
use PDOException;

class NguoiDungController extends BaseController
{
    private $_renderBase;
    private $nguoiDungModel;

    private $dbConnection;
    private $db;

    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    // Phương thức hiển thị giao diện đăng nhập
    public function loaduser()
    {
        $load = new NguoiDungModel();
        $data = $load->getAllUs(); // Sửa đổi tên phương thức gọi
        if (!is_array($data)) {
            $data = [];
        }
        // Render header
        $this->_renderBase->renderHeader();

        $this->_renderBase->renderHead();
 
       
        // Render trang đăng nhập
        $this->load->render('layouts/doc/nguoidung', $data);

        // Render footer
        $this->_renderBase->renderFooter();
    }
       
 public function deleteUs($id){
    $taiLieuModel = new NguoiDungModel();
    $result = $taiLieuModel->deleteUser($id);
    if ($result) {
        header('Location: ?url=NguoiDungController/loaduser');
        exit();
    } else {
        die("Xóa không thành công!");
    }
   
 }
   public function addUs(){
    $taiLieuModel = new NguoiDungModel();
  
    header('Location: ?url=TaiLieuController/TaiLieuControllerpage');
    $name = $_POST['ten'];
    $img = $_FILES['img'];
    $description = $_POST['mota'];

    $ngaytao = $_POST['ngaytao'];
    $id = $_GET['id'];
    if (isset($_FILES['img'])) {
        $old_name = $_FILES['img']['name'];
        $new_name = date('YmdHis') . '_' . $old_name;
    
        if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES['img']['tmp_name'], 'App/Views/layouts/images/' . $new_name);
            
            // Tiếp tục thực hiện các thao tác khác ở đây, chẳng hạn như lưu tên file vào cơ sở dữ liệu
        }
    }
    $data = [
        'ten' => $name,
       
        'mota' => $description,
    
        'ngaytao' =>$ngaytao,
        
        'anh' => $new_name
    ];
    $taiLieuModel->add($data);
}
    public function updateUs(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Xử lý dữ liệu form
            $name = $_POST['ten'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];

            $id = $_GET['id'];


        

            $nguoiDungModel = new NguoiDungModel();
            $data = [
                'ten' => $name,
                'email' => $email,
                'sdt' => $sdt,
                'diachi' => $diachi,
            
            
            ];

            $result = $nguoiDungModel->updateUsser($data, $id);
            if ($result) {
                header('Location: ?url=nguoiDungModel/loaduser');
                exit(); // Thêm lệnh exit để dừng việc thực thi kịp thời sau khi chuyển hướng
            } else {
                echo "Có lỗi xảy ra khi cập nhật dữ liệu.";
            }
        } else {
            echo 'Không có dữ liệu được gửi từ form.';
        }
    }
    public function updateUss($documentData){
      
            // Gọi phương thức cập nhật tài liệu từ model
            return $this->nguoiDungModel->updateUsser($documentData);
        
    }

}

