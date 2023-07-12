<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: SortableInterface.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Utility;

interface SortableInterface
{
    public function getSort(): ?array;
}
