<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: CatalogService.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Application\Service;


use app\Catalog\Application\Utility\RepositoryContainerInterface;
use app\Catalog\Domain\Dto\SearchBooksDtoInterface;
use Traversable;

class CatalogService
{
    public function __construct(
        private readonly RepositoryContainerInterface $repositoryContainer
    ){}

    public function getBookList(SearchBooksDtoInterface $dto): array
    {
        return $this->repositoryContainer->getBooksRepository()->getBookList($dto);
    }
}
