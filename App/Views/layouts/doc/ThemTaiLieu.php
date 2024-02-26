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
                    <h3 class="tile-title">Tạo mới tài liệu</h3>
                    <div class="tile-body">
                        <form class="row" method="post" action="?url=TaiLieuController/addTaiLieu" enctype="multipart/form-data">
                            <div class="form-group col-md-4">
                                <label class="control-label">Tên Tài Liệu</label>
                                <input class="form-control" type="text" name="ten">
                            </div> 
                            <div class="form-group col-md-4">
                                <label class="control-label">ID Thẻ Loại</label>
                                <input class="form-control" type="number" name="idtheloai">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Mô Tả</label>
                                <input class="form-control" type="text" name="mota">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Ngày Tạo</label>
                                <input class="form-control" type="date" name="ngaytao">
                            </div>
                            <!-- <div class="form-group col-md-4">
                                <label class="control-label">Nơi lưu</label>
                                <input class="form-control" type="text" name="noiluu">
                            </div> -->
                            <div class="form-group col-md-4">
                                <label class="control-label">Ảnh</label>
                                <input type="file" class="form-control bg-dark" id="img" name="img" >
                            </div>


                            <button class="btn btn-save" type="submit">Lưu lại</button>
                            <a class="btn btn-cancel" href="?url=TaiLieuController/TaiLieuControllerpage">Hủy bỏ</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>