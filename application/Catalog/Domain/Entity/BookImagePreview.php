<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: BookImagePreview.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Entity;


class BookImagePreview
{
    public function __construct(private readonly string $imagePath)
    {
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }
}
