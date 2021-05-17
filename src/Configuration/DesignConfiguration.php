<?php

declare(strict_types=1);

namespace RedBum\Configuration;

class DesignConfiguration
{
    /** @var string */
    private $theme;

    public function __construct(array $configuration)
    {
        $this->theme = $configuration['theme'];
    }

    public function theme(): string
    {
        return $this->theme;
    }
}
