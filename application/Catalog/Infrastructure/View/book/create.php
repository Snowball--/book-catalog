<?php

use app\Catalog\Infrastructure\Form\CreateBookForm as CreateBookFormAlias;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var CreateBookFormAlias $model */
/** @var ActiveForm $form */
/** @var array $authorsDropdown */
?>
<div class="create">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'writingYear') ?>
        <?= $form->field($model, 'description')->textarea() ?>
        <?= $form->field($model, 'isbn') ?>
        <?= $form->field($model, 'image')->fileInput() ?>
        <?= $form->field($model, 'authors')->dropDownList($authorsDropdown, ['multiple' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create -->
