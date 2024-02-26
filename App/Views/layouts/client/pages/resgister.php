<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="?url=ResgisterController/handleRegister" method="post">
                    <span class="login100-form-title">
                        <b>ĐĂNG KÍ HỆ THỐNG POS</b>
                    </span>

                    <!-- Thêm các trường mới -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" placeholder="Nhập Đầy Đủ Họ Tên" name="ten" id="ten">
                        <?php if (isset($_SESSION['error']) && isset($_SESSION['error']['ten'])) : ?>
                            <div class="text-danger"><?php echo $_SESSION['error']['ten']; ?></div>
                        <?php endif; ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-user'></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" placeholder="Email" name="email" id="email">
                        <?php if (isset($_SESSION['error']) && isset($_SESSION['error']['email'])) : ?>
                            <div class="text-danger"><?php echo $_SESSION['error']['email']; ?></div>
                        <?php endif; ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-envelope'></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" placeholder="Số Điện Thoại" name="sdt" id="sdt">
                        <?php if (isset($_SESSION['error']) && isset($_SESSION['error']['sdt'])) : ?>
                            <div class="text-danger"><?php echo $_SESSION['error']['sdt']; ?></div>
                        <?php endif; ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-phone'></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" placeholder="Địa Chỉ" name="diachi" id="diachi">
                        <?php if (isset($_SESSION['error']) && isset($_SESSION['error']['diachi'])) : ?>
                            <div class="text-danger"><?php echo $_SESSION['error']['diachi']; ?></div>
                        <?php endif; ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-map'></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu" name="password" id="password">
                        <?php if (isset($_SESSION['error']) && isset($_SESSION['error']['password'])) : ?>
                            <div class="text-danger"><?php echo $_SESSION['error']['password']; ?></div>
                        <?php endif; ?>
                        <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-key'></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Đăng Kí</button>
                    </div>
                    
                </form>
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="App/Views/layouts/images/email4.jpg" alt="IMG">
                </div>
                
            </div>
        </div>
        
    </div>

    <!-- Link Bootstrap JS (Nếu cần) -->
 
</body>