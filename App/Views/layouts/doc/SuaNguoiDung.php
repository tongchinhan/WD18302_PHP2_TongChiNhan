<body onload="time()" class="app sidebar-mini rtl">

    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách Tài Liệu</li>
                <li class="breadcrumb-item"><a href="#">Thêm Tài Liệu</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Sửa Mới Người Dùng</h3>
                    <div class="tile-body">
                        <form class="row" method="post" action="?url=NguoiDungController/updateUs&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                            <div class="form-group col-md-4">
                                <label class="control-label">Tên Người Dùng</label>
                                <input class="form-control" type="text" name="ten">
                            </div> 
                            <div class="form-group col-md-4">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="text" name="email">
                            </div> 
                       
                            <div class="form-group col-md-4">
                                <label class="control-label">Số Điện Thoại</label>
                                <input class="form-control" type="text" name="sdt">
                            </div> 
                            <div class="form-group col-md-4">
                                <label class="control-label">Địa Chỉ</label>
                                <input class="form-control" type="text" name="diachi">
                            </div> 
                            <button class="btn btn-save" type="submit" name="saveDocument">Lưu lại</button>
                            <a class="btn btn-cancel" href="?url=TaiLieuController">Hủy bỏ</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>