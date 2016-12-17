<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<!--recommended_items-->
<div class="recommended_items">
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">

            <?php $count = count($hits);
            $i = 0;

            foreach ($hits as $hit) : ?>
                <?php if ($i % 3 == 0) : ?>
                    <div class="item <?php if ($i == 0) echo 'active' ?>">
                <?php endif; ?>

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <?= Html::img("@web/images/products/{$hit['img']}", ['alt' => $hit['name']]) ?>
                                <h2>$<?= $hit['price'] ?></h2>
                                <p>
                                    <a href="<?= Url::to(['/product/view', 'id' => $hit['id']]) ?>"> <?= $hit['name'] ?></a>
                                </p>
                                <a href="<?= Url::to(['/cart/add', 'id' => $hit['id']]) ?>" data-id="<?= $hit->id ?>" class="btn add-to-cart btn-fefault  cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <?php $i++;
                if ($i % 3 == 0 || $i == $count) : ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>