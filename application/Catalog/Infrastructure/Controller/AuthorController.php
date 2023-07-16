<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: AuthorController.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Infrastructure\Controller;


use app\Catalog\Application\Service\CatalogService;
use app\Catalog\Infrastructure\Form\CreateAuthorForm;
use Yii;
use yii\filters\AccessControl;

class AuthorController extends BaseCatalogWebController
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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

    public function actionCreate(CatalogService $catalogService): string
    {
        $form = new CreateAuthorForm();
        $form->attributes = Yii::$app->request->post('CreateAuthorForm');

        if (Yii::$app->getRequest()->getIsPost()) {
            if ($form->validate()) {
                $author = $catalogService->createAuthor($form);
                Yii::$app->session->setFlash('success', 'Автор добавлен');
            }

            Yii::$app->session->setFlash('error', $form->getFirstErrors());
        }

        return $this->render('author/create', [
            'model' => $form
        ]);
    }
}
