<?php

declare(strict_types=1);

namespace app\Catalog\Infrastructure\Factory;

use app\Catalog\Application\Utility\RepositoryContainerInterface;
use app\Catalog\Domain\Entity\Book;
use app\Catalog\Domain\Entity\BookImagePreview;
use app\Catalog\Infrastructure\Repository\BookArRepository;

class BookFactory
{
    public function __construct(private RepositoryContainerInterface $repositoryContainer)
    {
    }

    public function factory(
        BookArRepository $authorData
    ): Book {
        return new Book(
            $this->repositoryContainer,
            $authorData->id,
            $authorData->title,
            $authorData->writing_year,
            $authorData->description,
            $authorData->isbn,
            new BookImagePreview('/images/' . $authorData->image)
        );
    }
}
