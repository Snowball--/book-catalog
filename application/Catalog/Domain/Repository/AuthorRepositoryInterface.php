<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: AuthorRepositoryInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Repository;

use app\Catalog\Domain\Dto\CreateAuthorDtoInterface;
use app\Catalog\Domain\Entity\Author;

interface AuthorRepositoryInterface
{
    public function getAllAuthors(): array;

    public function createAuthor(CreateAuthorDtoInterface $dto);
}
