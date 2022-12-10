<div class="login">
    <div class="login__header">
        <div class="login__logo">
            <a class="logo__link"><b>S</b> Smile </a>
        </div>
    </div>
    <form action="auth/signIn" class="login__form" method="POST">
        <div class="form-group">
            <input type="text" placeholder="Tài khoản" name="username">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Mật khẩu" name="password">
        </div>
        <div class="login__action">
            <div class="remember__login">
                <input type="checkbox">
                <label for="">Lưu mật khẩu</label>
            </div>
            <div class="register">
                <a href="#" class="register__link">Quên mật khẩu ?</a>
            </div>
        </div>
        <div class="login__btn">
            <button type="submit" class="btn btn--submit width-full rounded-2px">Đăng nhập</button>
        </div>
        <!-- <div class="login__btn">
            <a class="btn btn--submit width-full rounded-2px login__facebook">
                <i class="fa-brands fa-facebook-f"></i>
                Đăng nhập bằng Facebook
            </a>
        </div> -->
    </form>

</div>