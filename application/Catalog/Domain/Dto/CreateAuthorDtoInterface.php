<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: CreateAuthorDtoInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Dto;

interface CreateAuthorDtoInterface
{
    public function getFullName(): string;
}
