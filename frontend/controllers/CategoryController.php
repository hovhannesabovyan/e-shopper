<?php
namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Product;
use common\models\Category;
use yii\web\HttpException;

class CategoryController extends BaseController
{
    public $layout = 'inner';

    public function actionView($id)
    {
        /*$products = Product::find()
            ->where(['category_id' => $id])
            ->all();*/

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new HttpException(404, 'message');
        }

        $query = Product::find()
            ->where(['category_id' => $id]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->setMeta('E-Shopper | ' . $category->name, $category->keywords, $category->description);

        return $this->render('view', [
            'products' => $products,
            'category' => $category,
            'pages' => $pages
        ]);
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));

        $this->setMeta('E-SHOPPER | Поиск: ' . $q);

        if (!$q)
            return $this->render('search');

        $query = Product::find()->where(['like', 'name', $q]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false]);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('search', [
            'products' => $products,
            'pages' => $pages,
            'q' => $q
        ]);
    }
}
