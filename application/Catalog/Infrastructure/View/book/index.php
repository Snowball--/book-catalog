<?php

/* @var Book[] $books */
/* @var ArrayDataProvider $dataProvider */

use app\Catalog\Domain\Entity\Book;
use app\Catalog\Domain\Entity\BookImagePreview;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

?>

<div class="Catalog-default-index">
    <h1>Каталог книг</h1>

    <?php if (! Yii::$app->getUser()->isGuest): ?>
        <div class="btn-group">
            <a href="<?= \yii\helpers\Url::toRoute('book/create') ?>" class="btn btn-primary">Добавить книгу</a>
            <a href="<?= \yii\helpers\Url::toRoute('author/create') ?>" class="btn btn-success">Добавить автора</a>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-3">
                <div class="container">
                    <img src="<?= $book->getPreview() instanceof BookImagePreview ? $book->getPreview()->getImagePath() : '&mdash;'?>">
                    <div class="">
                        <?= \yii\helpers\Html::encode($book->getTitle()) ?>
                    </div>
                    <div><?= \yii\helpers\Html::encode($book->getDescription()) ?></div>
                    <div><?= \yii\helpers\Html::encode($book->getIsbn()) ?></div>
                    <div><?= \yii\helpers\Html::encode($book->getWritingYear()) ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
