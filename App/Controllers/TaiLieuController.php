<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\TaiLieuModel;
use App\Controllers\BaseController;


class TaiLieuController extends BaseController
{
    private $_renderBase;
    private $taiLieuModel;

    private $dbConnection;
    private $db;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    function TaiLieuControllerpage()
    {
        $load = new TaiLieuModel();
        $data = $load->getAll();
        if (!is_array($data)) {
            $data = [];
        }
        $this->_renderBase->renderHeader(); 
        $this->_renderBase->renderHead();
        $this->load->render('layouts/doc/tailieu', $data);
        $this->_renderBase->renderFooter();
    }
    public function them()
    {

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderHead();
        $this->load->render('layouts/doc/ThemTaiLieu');
        $this->_renderBase->renderFooter();
        
    }
  
   
 public function deleteTaiLieu($id){
    $taiLieuModel = new TaiLieuModel();
    $result = $taiLieuModel->deleteDocument($id);
    if ($result) {
        header('Location: ?url=TaiLieuController/TaiLieuControllerpage');
        exit();
    } else {
        die("Xóa không thành công!");
    }
   
 }
   public function addTaiLieu(){
    $taiLieuModel = new TaiLieuModel();
  
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
 public function updateTaiLieu(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Xử lý dữ liệu form
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
        $taiLieuModel = new TaiLieuModel();
        $data = [
            'ten' => $name,
           
            'mota' => $description,
        
            'ngaytao' =>$ngaytao,
            
            'anh' => $new_name
        ];
        $result = $taiLieuModel->updateDocumett($data, $id);
        if ($result) {
            header('Location: ?url=TaiLieuController/TaiLieuControllerpage');
        }
 
       
    } else {
        echo 'Không có dữ liệu được gửi từ form.';
    }

 }
 
}
 