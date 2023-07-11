<?php

namespace app\Catalog\Infrastructure\Controller;

use yii\web\Controller;

/**
 * Default controller for the `Catalog` module
 */
class DefaultController extends Controller
{
    public function getViewPath()
    {
        return \Yii::getAlias('@catalog/Infrastructure/View/default');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
