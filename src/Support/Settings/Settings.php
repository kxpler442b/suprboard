<?php

declare(strict_types = 1);

namespace App\Support\Settings;

class Settings implements SettingsInterface
{
    private array $settings;

    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * 
     * @return void
     */
    public function get(string $key = '')
    {
        return (empty($key)) ? $this->settings : $this->settings[$key];
    }
}