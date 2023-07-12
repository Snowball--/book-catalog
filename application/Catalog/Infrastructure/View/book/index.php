<?php

/* @var array $books */

?>

<div class="Catalog-default-index">
    <h1>Каталог книг</h1>

    <?php if (! Yii::$app->getUser()->isGuest): ?>
        <div class="btn-group">
            <a class="btn btn-primary">Добавить книгу</a>
            <a href="<?= \yii\helpers\Url::toRoute('author/create') ?>" class="btn btn-success">Добавить автора</a>
        </div>
    <?php endif; ?>

    <?php foreach ($books as $book): ?>
    <?php endforeach; ?>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
