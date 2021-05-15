<?php

declare(strict_types=1);

namespace RedBum\Configuration;

class RepositoryConfiguration
{
    /** @var string */
    private $directory;

    /** @var string */
    private $source;

    public function __construct(array $configuration)
    {
        $this->directory = $configuration['directory'];
        $this->source = $configuration['source'];
    }

    public function directory(): string
    {
        return $this->directory;
    }

    public function source(): string
    {
        return $this->source;
    }
}
