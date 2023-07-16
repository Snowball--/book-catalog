<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: Book.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Domain\Entity;


use app\Catalog\Application\Utility\RepositoryContainerInterface;

class Book implements EntityInterface
{
    public function __construct(
        private readonly RepositoryContainerInterface $repositoryContainer,
        private readonly int                          $id,
        private string                                $title,
        private int                                   $writingYear,
        private string                                $description = '',
        private string                                $isbn = '',
        private ?BookImagePreview                     $preview = null
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getWritingYear(): int
    {
        return $this->writingYear;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @return BookImagePreview|null
     */
    public function getPreview(): ?BookImagePreview
    {
        return $this->preview;
    }
}
