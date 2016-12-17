<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Product;
use yii\filters\AccessControl;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;

/**
 * Product controller
 */
class ProductController extends BaseController
{
    public $layout = 'inner';

    public function actionView($id)
    {
        $product = Product::findOne($id);
        if (empty($product)){
            throw new HttpException(404,'your message name');
        }
        $this->setMeta('E-Shopper | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', [
            'product' => $product
        ]);
    }
}