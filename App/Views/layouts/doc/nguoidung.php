



<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="#"><b>Danh sách người dùng</b></a></li>
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
                    Tạo mới người dùng</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                      class="fas fa-file-upload"></i> Tải từ file</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                      class="fas fa-copy"></i> Sao chép</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                      class="fas fa-file-pdf"></i> Xuất PDF</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                      class="fas fa-trash-alt"></i> Xóa tất cả </a>
                </div>
              </div>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
      
                    <th width="10%">ID Người Dùng</th>
                    <th width="30%">Tên</th>
                    <th width="30%">Email</th>
                    <th width="20%">Số Điện Thoại</th>
                    <th width="20%">Địa Chỉ</th>
                  </tr>
                </thead>
                <tbody>
                <?php if (!empty($data)) : ?>
                  <?php foreach ($data as $document) : ?>
                    <tr>
                      <td><?= isset($document['idnguoidung']) ? htmlentities($document['idnguoidung']) : ''; ?></td>
                      <td><?= isset($document['ten']) ? htmlentities($document['ten']) : ''; ?></td>
                      <td><?= isset($document['email']) ? htmlentities($document['email']) : ''; ?></td>
                      <td><?= isset($document['sdt']) ? htmlentities($document['sdt']) : ''; ?></td>
                      <td><?= isset($document['diachi']) ? htmlentities($document['diachi']) : ''; ?></td>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>

                <?php endif; ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
 
</body>
