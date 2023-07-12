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
use app\Catalog\Infrastructure\Repository\AuthorArRepository;
use app\Catalog\Infrastructure\Repository\BookArRepository;
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

    public function actionCreate(CatalogService $catalogService)
    {
        $form = new CreateAuthorForm();
        $form->attributes = \Yii::$app->request->post('CreateAuthorForm');

        if ($form->validate()) {
            $catalogService->createAuthor($form);
        }

        return $this->render('author/create', [
            'model' => $form
        ]);
    }
}