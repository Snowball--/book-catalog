<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: AuthorFactory.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Infrastructure\Factory;


use app\Catalog\Application\Utility\RepositoryContainerInterface;
use app\Catalog\Domain\Entity\Author;
use app\Catalog\Infrastructure\Repository\AuthorArRepository;
use app\Catalog\Infrastructure\Repository\RepositoryContainer;

readonly class AuthorFactory
{
    public function __construct(private RepositoryContainerInterface $repositoryContainer)
    {
    }

    public function factory(
        AuthorArRepository $authorData
    ): Author {
        return new Author(
            $this->repositoryContainer,
            $authorData->id,
            $authorData->full_name
        );
    }
}
