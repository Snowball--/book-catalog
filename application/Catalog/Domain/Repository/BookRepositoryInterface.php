<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: BookRepository.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Repository;

use app\Catalog\Domain\Dto\SearchBooksDtoInterface;

interface BookRepositoryInterface
{
    public function getBookList(SearchBooksDtoInterface $dto): array;
}
