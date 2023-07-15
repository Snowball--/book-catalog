<?php

declare(strict_types=1);

namespace app\Catalog\Domain\Dto;

use app\Catalog\Domain\Entity\Author;

/**
 * @package app\Catalog\Domain\Dto
 */
interface CreateBookDtoInterface
{
    public function getTitle(): string;

    public function getWritingYear(): ?int;

    public function getDescription(): string;

    public function getIsbn(): string;

    public function getImagePath(): ?string;

    /**
     * @return Author[]
     */
    public function getAuthors(): array;
}
