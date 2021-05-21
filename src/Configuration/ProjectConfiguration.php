<?php

declare(strict_types=1);

namespace RedBum\Configuration;

class ProjectConfiguration
{
    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var SettingsConfiguration */
    private $settings;

    public function __construct(array $configuration, SettingsConfiguration $settings)
    {
        $this->name = $configuration['name'];
        $this->description = $configuration['description'];
        $this->settings = $settings;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function settings(): SettingsConfiguration
    {
        return $this->settings;
    }
}
