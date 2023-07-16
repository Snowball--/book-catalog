<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: SearchAuthorsDtoInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Dto;

interface SearchAuthorsDtoInterface
{
    public function getSearchConditions(): array;
}
