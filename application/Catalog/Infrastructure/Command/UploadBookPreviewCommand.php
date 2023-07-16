<?php

declare(strict_types=1);

namespace app\Catalog\Infrastructure\Command;

use yii\web\UploadedFile;

class UploadBookPreviewCommand implements \app\Catalog\Domain\Command\UploadBookPreviewCommandInterface
{

    public function __construct(private UploadedFile $file, private string $filePath)
    {
    }

    public function execute()
    {
        $this->file->saveAs($this->filePath . '/' . $this->file->name);
    }
}
