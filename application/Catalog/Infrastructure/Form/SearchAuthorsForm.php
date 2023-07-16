<?php

declare(strict_types=1);

namespace app\Catalog\Infrastructure\Form;

use app\Catalog\Domain\Dto\SearchAuthorsDtoInterface;
use yii\base\Model;

class SearchAuthorsForm extends Model implements SearchAuthorsDtoInterface
{
    private array $conditions = [];

    public function getSearchConditions(): array
    {
        return $this->conditions;
    }
}
