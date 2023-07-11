<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: CatalogService.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Application\Service;


use app\Catalog\Application\Utility\RepositoryContainerInterface;

class CatalogService
{
    public function __construct(
        private readonly RepositoryContainerInterface $repositoryContainer
    ){}
}
