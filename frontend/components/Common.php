<?php
namespace frontend\components;

use yii\helpers\Url;
use yii\base\Component;
use yii\helpers\BaseFileHelper;

class Common extends Component
{
    public function debug($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}



