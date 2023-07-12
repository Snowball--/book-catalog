<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: SearchBooksDtoInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Dto;

interface SearchBooksDtoInterface
{
    public function getSearchConditions(): array;
}
