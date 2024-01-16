<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->

  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">

                <a class="btn btn-add btn-sm" href="form-add-don-hang.html" title="Thêm"><i class="fas fa-plus"></i>
                  Tạo mới đơn hàng</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
              </div>

              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
              </div>

              <div class="col-sm-2">
                <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i> Xóa tất cả </a>
              </div>
            </div>
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="all"></th>
                  <th>ID</th>
                  <th>ID Người Dùng</th>
                  <th>ID Tài liệu</th>
                  <th>Điểm số</th>
                  <th>Nội dung</th>
                  <th>Ngày Đánh Gía</th>
                  <th width="100">Chức Năng</th>
                </tr>
              </thead>
              <tbody>
             
                <tr>
                  <td width="10"><input type="checkbox" name="check1" value="1"></td>
                  <td>MD0837</td>
                  <td>Người dùng 1</td>
                  <td>Tài liệu 123</td>
                  <td>5</td>
                  <td>Nội dung đánh giá 1</td>
                  <td>31/12/2021</td>
                  <td>
                    <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                    <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i class="fa fa-edit"></i></button>
                  </td>
                </tr>
                <tr>
    <td width="10"><input type="checkbox" name="check2" value="2"></td>
    <td>MD0838</td>
    <td>Người dùng 2</td>
    <td>Tài liệu 456</td>
    <td>4</td>
    <td>Nội dung đánh giá 2</td>
    <td>01/01/2022</td>
    <td>
        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i class="fa fa-edit"></i></button>
    </td>
</tr>

<!-- Form 3 -->
<tr>
    <td width="10"><input type="checkbox" name="check3" value="3"></td>
    <td>MD0839</td>
    <td>Người dùng 3</td>
    <td>Tài liệu 789</td>
    <td>3</td>
    <td>Nội dung đánh giá 3</td>
    <td>02/01/2022</td>
    <td>
        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i class="fa fa-edit"></i></button>
    </td>
</tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

</body>