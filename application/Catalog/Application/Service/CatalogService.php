<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: CatalogService.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Application\Service;


use app\Catalog\Application\Utility\RepositoryContainerInterface;
use app\Catalog\Domain\Command\UploadBookPreviewCommandInterface;
use app\Catalog\Domain\Dto\CreateAuthorDtoInterface;
use app\Catalog\Domain\Dto\CreateBookDtoInterface;
use app\Catalog\Domain\Dto\SearchAuthorsDtoInterface;
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

    public function createBook(CreateBookDtoInterface $dto, ?UploadBookPreviewCommandInterface $command = null): Book
    {
        // TODO: очень странное решение отвязаться от деталей имплементации, подумать как это можно исправить
        if ($command instanceof UploadBookPreviewCommandInterface) {
            $command->execute();
        }
        $book = $this->repositoryContainer->getBooksRepository()->createBook($dto);

        $authorRepository = $this->repositoryContainer->getAuthorsRepository();
        foreach ($dto->getAuthors() as $authorId => $authorName) {
            $author = $authorRepository->get($authorId);

        }

        return $book;
    }

    public function getFullAuthorList(): array
    {
        return $this->repositoryContainer->getAuthorsRepository()->getAllAuthors();
    }

    public function createAuthor(CreateAuthorDtoInterface $dto): Author
    {
        return $this->repositoryContainer->getAuthorsRepository()->createAuthor($dto);
    }
}
