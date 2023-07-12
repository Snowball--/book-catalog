<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: RepositoryContainer.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Infrastructure\Repository;


use app\Catalog\Domain\Repository\AuthorRepositoryInterface;
use app\Catalog\Domain\Repository\BookRepositoryInterface;

class RepositoryContainer implements \app\Catalog\Application\Utility\RepositoryContainerInterface
{
    public function __construct(
        private readonly AuthorRepositoryInterface $authorRepository,
        private readonly BookRepositoryInterface $bookRepository
    ){}

    public function getAuthorsRepository(): AuthorRepositoryInterface
    {
        return $this->authorRepository;
    }

    public function getBooksRepository(): BookRepositoryInterface
    {
        return $this->bookRepository;
    }
}
