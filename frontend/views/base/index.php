<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <!--features_items-->
                <div class="features_items">
                    <h2 class="title text-center">Features Items</h2>

                    <?php if (!empty($hits)) : ?>
                        <?php foreach ($hits as $hit) : ?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">

                                        <div class="productinfo text-center">
                                            <?= Html::img("@web/images/products/{$hit['img']}", ['alt' => $hit['name']]) ?>
                                            <h2>$ <?= $hit['price'] ?></h2>
                                            <p>
                                                <a href="<?= Url::to(['/product/view', 'id' => $hit['id']]) ?>">
                                                    <?= $hit['name'] ?>
                                                </a>
                                            </p>
                                            <a href="<?= Url::to(['/cart/add', 'id' => $hit['id']]) ?>"
                                               data-id="<?= $hit['id'] ?>"
                                               class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </a>
                                        </div>

                                        <?php if ($hit['new']) : ?>
                                            <?= Html::img("@web/images/home/new.png", ['class' => 'new']) ?>
                                        <?php endif; ?>

                                        <?php if ($hit['sale']) : ?>
                                            <?= Html::img("@web/images/home/sale.png", ['class' => 'new']) ?>
                                        <?php endif; ?>

                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$ <?= $hit['price'] ?></h2>
                                                <p>
                                                    <a href="<?= Url::to(['/product/view', 'id' => $hit['id']]) ?>">
                                                        <?= $hit['name'] ?>
                                                    </a>
                                                </p>
                                                <a href="<?= Url::to(['/cart/add', 'id' => $hit['id']]) ?>"
                                                       data-id="<?= $hit['id'] ?>"
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
                                                <a href="#"><i class="fa fa-plus-square"></i>
                                                    Add to wishlist
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-plus-square"></i>
                                                    Add to compare
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!--features_items-->

                <!-- Category Tab -->
                <?= \frontend\widgets\CategoryTabWidget::widget() ?>
                <!-- End Category Tab -->

                <!-- Recommended Items -->
                <?= \frontend\widgets\RecommendedItemsWidget::widget() ?>
                <!-- End Recommended Items -->

            </div>
        </div>
    </div>
</section>