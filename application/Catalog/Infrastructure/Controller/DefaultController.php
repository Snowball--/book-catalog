<?php

namespace app\Catalog\Infrastructure\Controller;

use app\Catalog\Application\Service\CatalogService;
use app\Catalog\Application\Utility\RepositoryContainerInterface;
use app\Catalog\Infrastructure\Form\SearchBooksForm;
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
     * @param CatalogService $catalogService
     * @return string
     */
    public function actionIndex(CatalogService $catalogService): string
    {
        $form = new SearchBooksForm();
        $books = $catalogService->getBookList($form);

        return $this->render('index', [
            'books' => $books
        ]);
    }
}
