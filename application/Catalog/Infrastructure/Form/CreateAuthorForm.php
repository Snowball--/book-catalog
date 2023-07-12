<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: CreateAuthorForm.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Catalog\Infrastructure\Form;


use app\Catalog\Domain\Dto\CreateAuthorDtoInterface;
use yii\base\Model;

class CreateAuthorForm extends Model implements CreateAuthorDtoInterface
{
    public string $full_name = '';

    public function rules(): array
    {
        return [
            [['full_name'], 'required'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }
}
