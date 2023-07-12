<?php

/**
 * Created by PhpStorm.
 * Filename: BaseCatalogWebController.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Infrastructure\Controller;


use yii\web\Controller;

class BaseCatalogWebController extends Controller
{
    public function getViewPath()
    {
        return \Yii::getAlias('@catalog/Infrastructure/View');
    }
}