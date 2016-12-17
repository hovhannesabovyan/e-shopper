<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="col-sm-9 padding-right">
    <!--features_items-->
    <div class="features_items">
        <h2 class="title text-center"><?= $category['name'] ?></h2>

        <?php if (!empty($products)) : ?>
            <?php
            $i = 0;
            foreach ($products as $product) : ?>

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">

                            <div class="productinfo text-center">
                                <?= Html::img("@web/images/products/{$product['img']}", ['alt' => $product['name']]) ?>
                                <h2>$<?= $product['price'] ?></h2>
                                <p>
                                    <a href="<?= Url::to(['/product/view', 'id' => $product['id']]) ?>"> <?= $product['name'] ?></a>
                                </p>
                                <a href="<?= Url::to(['/cart/add', 'id' => $product['id']]) ?>"
                                   data-id="<?= $product['id'] ?>"
                                   class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </a>
                            </div>

                            <?php if ($product['new']) : ?>
                                <?= Html::img("@web/images/home/new.png", ['class' => 'new']) ?>
                            <?php endif; ?>

                            <?php if ($product['sale']) : ?>
                                <?= Html::img("@web/images/home/sale.png", ['class' => 'new']) ?>
                            <?php endif; ?>

                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$<?= $product['price'] ?></h2>
                                    <p>
                                        <a href="<?= Url::to(['/product/view', 'id' => $product['id']]) ?>"> <?= $product['name'] ?></a>
                                    </p>
                                    <a href="<?= Url::to(['/cart/add', 'id' => $product['id']]) ?>"
                                           data-id="<?= $product['id'] ?>"
                                           class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li>
                                    <a href=""><i class="fa fa-plus-square"></i>
                                        Add to wishlist
                                    </a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-plus-square"></i>
                                        Add to compare
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <?php $i++ ?>
                <?php if ($i % 3 == 0) : ?>
                    <div class="clearfix"></div>
                <?php endif; ?>

            <?php endforeach; ?>

            <div class="clearfix"></div>
            <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages
            ])
            ?>

        <?php else: ?>
            <h2>Здесь товаров пока нет...</h2>
        <?php endif; ?>

    </div>
    <!--features_items-->
</div>