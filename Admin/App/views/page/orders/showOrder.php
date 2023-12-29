<div class="bill">
    <div class="bill__header">
        <div class="btn-status 
                            <?php
                            echo $status = $order['StatusOrder'] == 1 ? 'btn-status--pending' : '';
                            echo $status = $order['StatusOrder'] == 2 ? 'btn-status--success' : '';
                            echo $status = $order['StatusOrder'] == 3 ? 'btn-status--close' : '';
                            ?>
                            ">
            <?php
            echo $status = $order['StatusOrder'] == 1 ? 'Đơn hàng mới' : '';
            echo $status = $order['StatusOrder'] == 2 ? 'Đã duyệt' : '';
            echo $status = $order['StatusOrder'] == 3 ? 'Đã hủy' : '';
            ?>
        </div>
        <p>Hóa đơn <b>#<?php echo $order['ID'] ?></b></p>
    </div>
    <div class="bill__content">
        <div class="bill__top">
            <div class="bill__info">
                <div class="customer__info">
                    <p class="customer__position">Khách hàng</p>
                    <p class="customer__name">- <?php echo $customer['Name']  ?></p>
                    <p class="customer__phone">- <?php echo $customer['PhoneNumber']  ?></p>
                </div>
                <div class="bill__receive">
                    <div class="receive__title">Gửi tới</div>
                    <div class="receive__name"><?php echo $order['NameReceive'] ?></div>
                    <div class="receive__phone"><?php echo $order['PhoneReceive'] ?></div>
                    <div class="receive__address"><?php echo $order['AddressReceive'] ?></div>
                    <div class="receive__note"><?php echo $order['Note'] ?></div>
                    <div class="receive__note">Phương thức thanh toán: <?php echo $payment = $order['payment'] == 0 ? "COD" : 'MOMO' ?></div>

                </div>
            </div>
            <div class="bill__date">
                <p>
                    Thời gian -
                    <?php $date = strtotime($order['OrderDate']);
                    $date = date('H:i:s d/m/Y', $date);
                    echo $date
                    ?>
                </p>
            </div>
        </div>
        <div class="bill__main">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($orderDetail = mysqli_fetch_array($orderDetails)) { ?>
                        <tr>
                            <td class="text-center">1</td>
                            <td><?php echo $orderDetail['Name'] ?></td>
                            <td class="text-center"><?php echo strtoupper($orderDetail['Size']) ?></td>
                            <td class="text-center"><?php echo $orderDetail['Quantity'] ?></td>
                            <td class="text-right"><?php echo number_format($orderDetail['Price'], 0, '.', '.');  ?></td>
                            <td class="text-right"><?php echo number_format(($orderDetail['Price'] * $orderDetail['Quantity']), 0, '.', '.'); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="bill__bottom">
            <p class="bill__total">Tổng cộng: <?php echo number_format($order['Total'], 0, '.', '.');  ?></p>
            <div class="bill__action">
                <div style="display:<?php echo $display = $order['StatusOrder'] == 1 ? '' : 'none' ?>">
                    <a href="order/acceptShow/<?php echo $order['ID'] ?>" class="btn-action btn-action--accept">
                        <i class="fa-solid fa-check"></i>
                    </a>
                    <a href="order/destroyShow/<?php echo $order['ID'] ?>" class="btn-action btn-action--destroy">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bill__footer">
        <a href="#" class="btn btn--share">
            <i class="fa-solid fa-paper-plane"></i>
            Send
        </a>
        <a href="#" class="btn btn--submit rounded-2px">In</a>
    </div>
</div>