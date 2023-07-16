<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: Author.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Entity;


use app\Catalog\Application\Utility\RepositoryContainerInterface;
use app\Catalog\Domain\Repository\AuthorRepositoryInterface;
use app\Catalog\Infrastructure\Repository\RepositoryContainer;

class Author implements EntityInterface
{
    public function __construct(
        private readonly AuthorRepositoryInterface $authorRepository,
        private readonly int  $id,
        private string $fullName
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function publishBook(Book $book)
    {

    }
}
