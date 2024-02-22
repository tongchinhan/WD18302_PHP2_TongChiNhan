


<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
            <form class="login100-form validate-form" action="?url=LoginController/handleLogin" method="post">
                    <span class="login100-form-title">
                        <b>ĐĂNG NHẬP HỆ THỐNG POS</b>
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" placeholder="Tài khoản quản trị" name="email" id="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-user'></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu" name="password" id="password">
                        <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-key'></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Đăng nhập</button>
                    </div>
                <div class="text-right p-t-12">
                    <a class="txt2" href="?url=FogotpassController/loadViewFogot">
                        Bạn quên mật khẩu?
                    </a>
                    
                    <a class="txt2" href="?url=ResgisterController/loadViewRegister">
                    Đăng Kí Tài Khoản !
                    </a>
                </div>
             
                </form>
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="App/Views/layouts/images/email3.jpg" alt="IMG">
              </div>

               
            </div>
        </div>
    </div>
 
</body>

