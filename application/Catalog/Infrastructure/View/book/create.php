<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\Catalog\Infrastructure\Repository\BookArRepository $model */
/** @var ActiveForm $form */
?>
<div class="create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'writingYear') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'isbn') ?>
        <?= $form->field($model, 'image') ?>
        <?= $form->field($model, 'authors') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create -->
