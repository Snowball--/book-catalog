<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: container.php
 * @author snowball <snow-snowball@yandex.ru>
 */

use app\Catalog\Application\Service\CatalogService;
use app\Catalog\Infrastructure\Repository\RepositoryContainer;
use yii\di\Container;

return [
    'definitions' => [
        'app\Catalog\Domain\Repository\AuthorRepositoryInterface'
            => 'app\Catalog\Infrastructure\Repository\AuthorArRepository',
        'app\Catalog\Domain\Repository\BookRepositoryInterface'
            => 'app\Catalog\Infrastructure\Repository\BookArRepository',
        'app\Catalog\Application\Utility\RepositoryContainerInterface'
            => function (Container $container, $params, $config) {
                return new RepositoryContainer(
                    $container->get('app\Catalog\Domain\Repository\AuthorRepositoryInterface'),
                    $container->get('app\Catalog\Domain\Repository\BookRepositoryInterface'),
                );
            },
        'app\Catalog\Application\Service\CatalogService'
            => function (Container $container, $params, $config) {
                return new CatalogService(
                    $container->get('app\Catalog\Application\Utility\RepositoryContainerInterface')
                );
            }
    ]
];
