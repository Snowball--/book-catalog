<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: SearchBooksForm.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Infrastructure\Form;


use app\Catalog\Domain\Dto\SearchBooksDtoInterface;
use app\Utility\PageableInterface;
use app\Utility\PageableTrait;
use app\Utility\SortableInterface;
use app\Utility\SortingTrait;
use yii\base\Model;

class SearchBooksForm extends Model implements SearchBooksDtoInterface, PageableInterface, SortableInterface
{
    use PageableTrait;

    use SortingTrait;



    public function getSearchConditions(): array
    {
        return [];
    }
}
