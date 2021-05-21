<?php

declare(strict_types=1);

namespace RedBum\Data;

class DataProvider
{
    private $context = [];

    public function addContext(array $context): self
    {
        $this->context = array_merge($this->context, $context);
        return $this;
    }

    public function context(): array
    {
        return $this->context;
    }
}
