<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\Catalog\Infrastructure\Repository\BookArRepository $model */
/** @var ActiveForm $form */
?>
<div class="SearchBookForm">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'writing_year') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'isbn') ?>
        <?= $form->field($model, 'image') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- SearchBookForm -->
