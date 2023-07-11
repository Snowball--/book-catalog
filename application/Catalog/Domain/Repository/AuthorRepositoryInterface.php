<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: AuthorRepositoryInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Repository;

interface AuthorRepositoryInterface
{
    public function getAllAuthors();
}
