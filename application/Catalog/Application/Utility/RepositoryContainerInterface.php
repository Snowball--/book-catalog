<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: RepositoryContainerInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Application\Utility;

use app\Catalog\Domain\Repository\AuthorRepositoryInterface;
use app\Catalog\Domain\Repository\BookRepositoryInterface;

interface RepositoryContainerInterface
{
    public function getAuthorsRepository(): AuthorRepositoryInterface;

    public function getBooksRepository(): BookRepositoryInterface;
}
