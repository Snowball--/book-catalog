<?php

/* @var array $books */

?>

<div class="Catalog-default-index">
    <h1>Каталог книг</h1>

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
