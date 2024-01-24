<?php

namespace Msifpt\Wd18302Php2TongChiNhan\Controllers;

use Msifpt\Wd18302Php2TongChiNhan\Core\RenderBase;


class HomeController extends BaseController
{
    private $_renderBase;

    /**
     * Hàm khởi tạo của HomeController.
     * 
     * Khởi tạo đối tượng RenderBase (được kế thừa từ BaseController) và gán cho thuộc tính $_renderBase.
     */
    function __construct()
    {
        parent::__construct();  // Gọi hàm khởi tạo của BaseController
        $this->_renderBase = new RenderBase();  // Khởi tạo đối tượng RenderBase
    }

    /**
     * Phương thức HomeController.
     * 
     * Gọi phương thức homePage để hiển thị trang chủ.
     */
    function HomeController()
    {
        $this->homePage();
    }

    /**
     * Phương thức homePage để hiển thị trang chủ.
     * 
     * Dữ liệu được lấy từ repositories hoặc model và truyền vào các trang views.
     */
    function homePage()
    {
        // Dữ liệu ở đây lấy từ repositories hoặc model
        $data = [
            "products" => [
                [
                    "id" => 1,
                    "name" => "Sản phẩm"
                ]
            ]
        ];

        // Gọi phương thức renderHeader từ đối tượng $_renderBase để hiển thị phần header của trang
        $this->_renderBase->renderHeader();
        
        // Gọi phương thức render từ $this->load để hiển thị các phần trang views
        $this->load->render('layouts/client/slider');
        $this->load->render('layouts/client/home_product', $data);

        // Gọi phương thức renderFooter từ đối tượng $_renderBase để hiển thị phần footer của trang
        $this->_renderBase->renderFooter();
    }

    /**
     * Phương thức detail để hiển thị chi tiết sản phẩm.
     * 
     * Dữ liệu ở đây có thể lấy từ repositories hoặc model và xử lý chi tiết sản phẩm.
     * @param int $id - ID của sản phẩm cần hiển thị chi tiết.
     */
    function detail($id)
    {
        // Dữ liệu ở đây lấy từ repositories hoặc model
        
        // Xử lý hiển thị chi tiết sản phẩm với ID được truyền vào
    }
}
