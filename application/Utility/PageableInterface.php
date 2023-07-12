<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: PageableInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Utility;

interface PageableInterface
{
    public function getPage(): int;

    public function getLimit(): int;

    public function getOffset(): int;
}
