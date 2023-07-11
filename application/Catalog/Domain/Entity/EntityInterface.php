<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: EntityInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Entity;

interface EntityInterface
{
    public function getId(): int;
}
