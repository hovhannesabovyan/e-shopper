<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php

$mainImg = $product->getImage();

$gallery = $product->getImages();

?>

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <?php $img = $model->getImage(); ?>

                <?= Html::img($mainImg->getUrl()) ?>

                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">


                    <?php
                    $count = count($gallery);
                    $i = 0;

                    foreach ($gallery as $img) : ?>
                        <?php if ($i % 3 == 0): ?>
                            <div class="item <?php if ($i == 0) echo "active" ?>">
                        <?php endif; ?>
                        <a href="">
                            <?= Html::img($img->getUrl('84x85')) ?>
                        </a>
                        <?php $i++;
                        if ($i % 3 == 0 || $i == $count): ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <?php if ($product['new']) : ?>
                    <?= Html::img("@web/images/home/new.png", ['class' => 'newarrival']) ?>
                <?php endif; ?>

                <?php if ($product['sale']) : ?>
                    <?= Html::img("@web/images/home/sale.png", ['class' => 'newarrival']) ?>
                <?php endif; ?>

                <h2><?= $product['name'] ?></h2>
                <p>Web ID: <?= $product['id'] ?></p>
                <img src="/images/product-details/rating.png" alt=""/>
                <span>
                    <span>US $ <?= $product['price'] ?></span>
                    <label>Quantity:</label>
                    <input type="text" value="1" id="qty">
                    <a
                            data-id="<?= $product->id ?>" class="btn add-to-cart btn-fefault  cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
                </span>
                <p><b>Brand:</b>
                    <a href="<?= Url::to(['/category/view', 'id' => $product->category->id]) ?>">
                        <?= $product->category->name ?>
                    </a>
                </p>
                <a href="">
                    <img src="/images/product-details/share.png" class="share img-responsive" alt=""/>
                </a>
                <hr>
                <span>
                    <?= $product['content'] ?>
                </span>

            </div>

            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->


    <?= \frontend\widgets\CategoryTabWidget::widget() ?>
    <!--/category-tab-->

    <?= \frontend\widgets\RecommendedItemsWidget::widget() ?>
    <!--/recommended_items-->

</div>
 