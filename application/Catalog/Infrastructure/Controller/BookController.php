<?php

namespace app\Catalog\Infrastructure\Controller;

use app\Catalog\Application\Service\CatalogService;
use app\Catalog\Application\Utility\Helper;
use app\Catalog\Domain\Entity\Author;
use app\Catalog\Infrastructure\Command\UploadBookPreviewCommand;
use app\Catalog\Infrastructure\Form\CreateBookForm;
use app\Catalog\Infrastructure\Form\SearchBooksForm;
use app\Utility\PageableInterface;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

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

        $pagination = null;
        if ($form instanceof PageableInterface) {
            $pagination = [
                'pageSize' => $form->getLimit(),
                'page' => $form->getPage()
            ];
        }

        $dataProvider = new ArrayDataProvider([
            'models' => $books,
            'pagination' => $pagination
        ]);

        return $this->render('book/index', [
            'books' => $books,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate(CatalogService $catalogService): string
    {
        $form = new CreateBookForm();

        $form->load(Yii::$app->request->post());
        $form->image = UploadedFile::getInstance($form, 'image');

        if (Yii::$app->request->getIsPost()) {
            if ($form->validate()) {
                $command = new UploadBookPreviewCommand($form->getImage(), Yii::getAlias('@images'));
                $book = $catalogService->createBook($form, $command);


                Yii::$app->session->setFlash('success', 'Книга успешно добавлена');
            }

            Yii::$app->session->setFlash('error', $form->getFirstErrors());
        }

        return $this->render('book/create', [
            'model' => $form,
            'authorsDropdown' => Helper::getAuthorsDropdownStructure($catalogService->getFullAuthorList())
        ]);
    }
}
