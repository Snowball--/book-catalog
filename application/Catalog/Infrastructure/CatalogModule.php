<?php

namespace app\Catalog\Infrastructure;

/**
 * Catalog module definition class
 */
class CatalogModule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\Catalog\Infrastructure\Controller';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
