<header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="index.php?act=home"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="Admin/public/img-anhthe/thangl.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Nhân Tống</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
    <li><a class="app-menu__item haha" href="index.php?act=phan-mem-ban-hang"><i class='app-menu__icon bx bx-cart-alt'></i>
        <span class="app-menu__label">POS Bán Hàng</span></a></li>
    <li><a class="app-menu__item <?php echo ($act == 'home') ? 'active' : ''; ?>" href="index.php?act=home"><i
            class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item <?php echo ($act == 'danhsachtailieu') ? 'active' : ''; ?>" href="index.php?act=danhsachtailieu"><i
            class='app-menu__icon bx bx-id-card'></i> <span class="app-menu__label">Danh Sách Tài Liệu</span></a></li>
    <li><a class="app-menu__item <?php echo ($act == 'danhsachtheloai') ? 'active' : ''; ?>" href="index.php?act=danhsachtheloai"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Danh Sách Thể Loại</span></a>
    </li>
    <li><a class="app-menu__item <?php echo ($act == 'danhsachbinhluan') ? 'active' : ''; ?>" href="index.php?act=danhsachbinhluan"><i
            class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Danh Sách Bình Luận</span></a></li>
    <li><a class="app-menu__item <?php echo ($act == 'danhsachnguoidung') ? 'active' : ''; ?>" href="index.php?act=danhsachnguoidung"><i
            class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Danh Sách Người Dùng</span></a>
    </li>
    <li><a class="app-menu__item <?php echo ($act == 'danhsachdanhgia') ? 'active' : ''; ?>" href="index.php?act=danhsachdanhgia"><i
            class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Danh Sách Đánh Gía</span></a></li>
    <!-- Các mục khác -->
</ul>

  </aside>