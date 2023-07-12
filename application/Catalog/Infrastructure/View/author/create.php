<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\Catalog\Infrastructure\Repository\AuthorArRepository $model */
/** @var ActiveForm $form */
?>
<div class="create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'full_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create -->
