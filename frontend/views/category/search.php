<?php
use yii\helpers\Html;

?>

<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
        <?php if (!empty($products)): ?>
            <?php $i = 0;
            foreach ($products as $product): ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <?= Html::img("@web/images/products/{$product->img}", ['alt' => $product->name]) ?>
                                <h2>
                                    $<?= $product->price ?>
                                </h2>
                                <p>
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">
                                        <?= $product->name ?>
                                    </a>
                                </p>
                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                </a>
                            </div>
                            <?php if ($product->new): ?>
                                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                            <?php endif ?>
                            <?php if ($product->sale): ?>
                                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
                            <?php endif ?>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li>
                                    <a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-plus-square"></i>Add to compare</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
                <?php if ($i % 3 == 0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="clearfix"></div>
            <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        <?php else : ?>
            <h2>Ничего не найдено...</h2>
        <?php endif; ?>
    </div><!--features_items-->
</div>