<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * Filename: PageableTrait.php
 * @author snowball <snow-snowball@yandex.ru>
 */

namespace app\Utility;

use LogicException;

trait PageableTrait
{
    protected int $page = 1;

    protected int $limit = 20;

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        if ($this->getPage() - 1 < 0) {
            throw new LogicException('Wrong page number');
        }

        return ($this->getPage() - 1) * $this->getLimit();
    }

    public function setPage(int $page = 0): void
    {
        if ($page < 1) {
            $page = 1;
        }

        $this->page = $page;
    }

    public function setLimit(int $limit): void
    {
        if ($this->limit < 1) {
            throw new LogicException('Wrong limit');
        }

        $this->limit = $limit;
    }
}
