<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: SortingTrait.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Utility;

trait SortingTrait
{
    private ?array $sortingProperties = null;

    public function addSort(array $sortProperties): void
    {
        $this->sortingProperties =
            null === $this->sortingProperties
                ? $sortProperties : array_merge($this->sortingProperties, $sortProperties);
    }

    public function getSort(): ?array
    {
        return $this->sortingProperties;
    }
}
