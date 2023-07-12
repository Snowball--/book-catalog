<?php

namespace app\Catalog\Infrastructure\Controller;

use app\Catalog\Application\Service\CatalogService;
use app\Catalog\Infrastructure\Form\SearchBooksForm;

/**
 * Default controller for the `Catalog` module
 */
class DefaultController extends BaseCatalogWebController
{
    /**
     * Renders the index view for the module
     * @param CatalogService $catalogService
     * @return string
     */
    public function actionIndex(CatalogService $catalogService): string
    {
        $form = new SearchBooksForm();
        $books = $catalogService->getBookList($form);

        return $this->render('default/index', [
            'books' => $books
        ]);
    }

    public function actionAddAuthor(CatalogService $catalogService): string
    {

    }
}
