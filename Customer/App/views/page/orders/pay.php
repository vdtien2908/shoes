<div class="pay">
    <div class="container">
        <div class="pay__container">
            <form class="form bill" action="order/thank" method="POST">
                <div class="form__title">
                    <h1 class="text-center">Thông tin nhận hàng</h1>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Tên Người nhận" name="nameReceive">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Địa chỉ người nhận" name="addressReceive">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Số điện thoài người nhận" name="phoneReceive">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Ghi chú" name="note">
                </div>
                <div class="form-group">
                    <textarea type="text" placeholder="Tên Người nhận" rows="10" readonly="true" class="bill_input">
<?php if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $value) {
        $total += $value['PromotionPrice'] * $value['Quantity'];
        echo '- ' . $value['Name'] . ' - Size ' . $value['Size'] . ' -- ' . '( ' . number_format($value['PromotionPrice'], 0, ',', ',') . ' x ' . $value['Quantity']  . ' = ' . number_format($value['PromotionPrice'] * $value['Quantity'], 0, ',', ',') . ' )' . '&#13';
    }
    echo '&#13' . "- Tổng tiền: " . number_format($total, 0, ',', ',') . " VNĐ";
}
?>
                    </textarea>
                </div>
                <div class="form__btn">
                    <button type="submit">Gửi</button>
                </div>
            </form>
            <div class="pay__right">
                <div class="pay__logo">
                    <img src="./public/img/logo.png" alt="">
                </div>
                <p class="">DKT được thành lập với niềm đam mê và khát vọng thành công trong lĩnh vực Thương mại điện tử.</p>
                <ul>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        182/72 Ninh Kiều, Cần Thơ
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        Hotline: 097 1539 681
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        Smile@gmail.com
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>