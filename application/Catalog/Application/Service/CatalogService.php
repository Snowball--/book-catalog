<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: CatalogService.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Application\Service;


use app\Catalog\Application\Utility\RepositoryContainerInterface;
use app\Catalog\Domain\Dto\CreateAuthorDtoInterface;
use app\Catalog\Domain\Dto\CreateBookDtoInterface;
use app\Catalog\Domain\Dto\SearchBooksDtoInterface;
use app\Catalog\Domain\Entity\Author;
use app\Catalog\Domain\Entity\Book;

readonly class CatalogService
{
    public function __construct(
        private RepositoryContainerInterface $repositoryContainer
    ) {}

    public function getBookList(SearchBooksDtoInterface $dto): array
    {
        return $this->repositoryContainer->getBooksRepository()->getBookList($dto);
    }

    public function createAuthor(CreateAuthorDtoInterface $dto): Author
    {
        return $this->repositoryContainer->getAuthorsRepository()->createAuthor($dto);
    }

    public function createBook(CreateBookDtoInterface $dto): Book
    {
        return $this->repositoryContainer->getBooksRepository()->createBook($dto);
    }
}
