<?php

declare(strict_types=1);

namespace app\Catalog\Application\Utility;

use app\Catalog\Domain\Entity\Author;

readonly abstract class Helper
{
    /**
     * @param Author[] $authors
     * @return array
     */
    public static function getAuthorsDropdownStructure(array $authors): array
    {
        $authorsDropdown = [];
        foreach ($authors as $author) {
            /* @var Author $author */
            $authorsDropdown[$author->getId()] = $author->getFullName();
        }

        return $authorsDropdown;
    }
}
