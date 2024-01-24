<?php

namespace Msifpt\Wd18302Php2TongChiNhan\Controllers;

use Msifpt\Wd18302Php2TongChiNhan\Core\Render;


class BaseController
{
    protected Render $load;
    
    /**
     * Hàm khởi tạo của BaseController.
     * 
     * Khởi tạo đối tượng Render và gán cho thuộc tính $load.
     */
    function __construct()
    {
        $this->load = new Render();
    }

    /**
     * Hàm redirect để chuyển hướng đến một URL cụ thể.
     * 
     * @param string $url     URL cần chuyển hướng đến.
     * @param mixed $refresh  Thời gian refresh trang (nếu có). Mặc định là null.
     * 
     * @return void
     */
    public function redirect(string $url, $refresh = null): void
    {
        // Sử dụng header để thực hiện chuyển hướng đến URL được chỉ định
        header('location:' . $url);

        // Nếu có thời gian refresh được cung cấp, thêm header refresh
        if ($refresh !== null) {
            header('Refresh:' . $refresh . ';url=' . $url);
        }

        // Kết thúc thực thi của script sau khi chuyển hướng
        exit();
    }
}
