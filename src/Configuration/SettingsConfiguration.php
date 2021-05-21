<?php

declare(strict_types=1);

namespace RedBum\Configuration;

class SettingsConfiguration
{
    /** @var bool */
    private $register;

    /** @var bool */
    private $login;

    /** @var bool */
    private $search;

    public function __construct(array $configuration)
    {
        $this->register = $configuration['register'];
        $this->login = $configuration['login'];
        $this->search = $configuration['search'];
    }

    public function registrable(): bool
    {
        return $this->register;
    }

    public function loginEnabled(): bool
    {
        return $this->login;
    }

    public function searchable(): bool
    {
        return $this->search;
    }
}
