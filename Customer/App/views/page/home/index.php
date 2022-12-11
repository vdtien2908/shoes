<?php require_once './App/views/partials/slider.php'; ?>
<div class="collection">
    <div class="container">
        <div class="collection__container">
            <?php require_once './App/views/partials/sidebar.php' ?>
            <div class="content">
                <div class="product__container">
                    <div class="product__title">
                        <h2>Sản phẩm mới nhất</h2>
                    </div>
                    <div class="products">
                        <?php foreach ($products as $product) {
                        ?>
                            <div class="card">
                                <div class="card__img">
                                    <img src="../product_img/<?php echo $product['Img'] ?>" alt="">
                                </div>
                                <div class="card__content">
                                    <div class="content__title"><?php echo $product['Name'] ?></div>
                                    <div class="content__price">
                                        <p><?php echo number_format($product['PromotionPrice'], 0, ',', ',');  ?><b>đ</b></p>
                                        <p><?php echo number_format($product['Price'], 0, ',', ',');  ?> <b>đ</b></p>
                                    </div>
                                </div>
                                <div class="card__discount" style="<?php echo $discount = $product['Discount'] == 0 ? 'display: none;' : '' ?>">-<?php echo $product['Discount'] ?>%</div>
                                <a href="product/show/<?php echo $product['ID'] ?>" class="card__link"></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="banner__middle">
                    <img src="./public/img/article_ads_banner_1.jpg" alt="">
                </div>

                <div class="product__container ">
                    <div class="product__title">
                        <h2>Sản phẩm khuyến mãi</h2>
                    </div>
                    <div class="products">
                        <?php while ($product =  mysqli_fetch_array($productDiscount)) {
                        ?>
                            <div class="card">
                                <div class="card__img">
                                    <img src="../product_img/<?php echo $product['Img'] ?>" alt="">
                                </div>
                                <div class="card__content">
                                    <div class="content__title"><?php echo $product['Name'] ?></div>
                                    <div class="content__price">
                                        <p><?php echo number_format($product['PromotionPrice'], 0, ',', ',');  ?><b>đ</b></p>
                                        <p><?php echo number_format($product['Price'], 0, ',', ',');  ?> <b>đ</b></p>
                                    </div>
                                </div>
                                <div class="card__discount" style="<?php echo $discount = $product['Discount'] == 0 ? 'display: none;' : '' ?>">-<?php echo $product['Discount'] ?>%</div>
                                <a href="product/show/<?php echo $product['ID'] ?>" class="card__link"></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>