<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: CreateBookForm.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Infrastructure\Form;


use app\Catalog\Domain\Dto\CreateBookDtoInterface;
use app\Catalog\Infrastructure\Form\Enum\BookScenarios;
use yii\base\Model;
use yii\web\UploadedFile;

class CreateBookForm extends Model implements CreateBookDtoInterface
{
    public string $title = '';

    public ?int $writingYear = null;

    public string $description = '';

    public string $isbn = '';

    public ?UploadedFile $image = null;

    public array $authors = [];

    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['title', 'isbn'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['writingYear'], 'integer', 'max' => date('Y')],
            [['image'], 'image', 'skipOnEmpty' => false],
        ];
    }

    public function scenarios(): array
    {
        return [
            BookScenarios::Create->value => ['title', 'description', 'writingYear', 'isbn']
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getWritingYear(): ?int
    {
        return $this->writingYear;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getImage(): ?UploadedFile
    {
        return $this->image;
    }

    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function getImagePath(): ?string
    {
        return $this->image instanceof UploadedFile ? $this->image->fullPath : '';
    }
}
