<div class="container">
    <form class="form" action="auth/create" method="POST">
        <div class="form__title">
            <h1>Đăng ký</h1>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Họ và tên" name="name">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Mật khẩu" name="pass">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Nhập lại mật khẩu" name="pass_r">
        </div>
        <div class="form-group">
            <input type="date" placeholder="Ngày sinh" name="birthday">
        </div>
        <div class="form-group">
            <textarea type="text" placeholder="Địa chỉ" name="address"></textarea>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Điện thoại" name="phoneNumber">
        </div>
        <div class="form__btn">
            <button type="submit">Đăng ký</button>
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
            <p>Bạn đã có tài khoản ? <a href="auth/sayHi">Đăng nhập</a></p>
        </div>
    </form>
</div>