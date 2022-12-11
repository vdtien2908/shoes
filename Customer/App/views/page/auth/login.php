<div class="container">
    <form class="form" action="auth/signIn" method="POST">
        <div class="form__title">
            <h1>Đăng nhập</h1>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Tài khoản" name="username">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Mật khẩu" name="password">
        </div>
        <div class="form__btn">
            <button type="submit">Đăng nhập</button>
        </div>
        <div class="form__support">
            <a href="#">Quên mật khẩu</a>
            <a href="#">Đăng nhập bằng SMS</a>
        </div>
        <div class="form__bottom">
            <p>Hoặc</p>
            <ul>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-facebook"></i>
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-google"></i>
                        Google
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-apple"></i>
                        Apple
                    </a>
                </li>
            </ul>
            <p>Bạn mới biết tới BigShoes ? <a href="auth/register">Đăng ký</a></p>
        </div>
    </form>
</div>