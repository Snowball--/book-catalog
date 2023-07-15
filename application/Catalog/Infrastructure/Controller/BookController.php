<?php

namespace app\Catalog\Infrastructure\Controller;

use app\Catalog\Application\Service\CatalogService;
use app\Catalog\Infrastructure\Form\CreateBookForm;
use app\Catalog\Infrastructure\Form\SearchBooksForm;
use yii\filters\AccessControl;

/**
 * Default controller for the `Catalog` module
 */
class BookController extends BaseCatalogWebController
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
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

        return $this->render('book/index', [
            'books' => $books
        ]);
    }

    public function actionCreate(CatalogService $catalogService): string
    {
        $form = new CreateBookForm();
        $form->attributes = \Yii::$app->request->post('CreateBookForm');

        if ($form->validate()) {
            $book = $catalogService->createBook($form);
        }

        return $this->render('book/create', [
            'model' => $form
        ]);
    }
}
