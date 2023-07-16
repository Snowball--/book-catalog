<?php

/* @var Book[] $books */

use app\Catalog\Domain\Entity\Book;
use app\Catalog\Domain\Entity\BookImagePreview;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="Catalog-default-index">
    <h1>Каталог книг</h1>

    <?php if (! Yii::$app->getUser()->isGuest): ?>
        <div class="btn-group">
            <a href="<?= Url::toRoute('book/create') ?>" class="btn btn-primary">Добавить книгу</a>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-3">
                <div class="container">
                    <img
                            class="img-thumbnail"
                            src="<?= $book->getPreview() instanceof BookImagePreview
                                ? Html::encode($book->getPreview()->getImagePath()) : '&mdash;'?>"
                    >
                    <div class="">
                        <?= Html::encode($book->getTitle()) ?>
                    </div>
                    <div><?= Html::encode($book->getDescription()) ?></div>
                    <div><?= Html::encode($book->getIsbn()) ?></div>
                    <div><?= Html::encode($book->getWritingYear()) ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
