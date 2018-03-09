<?php

namespace ScoutElastic;

use Illuminate\Support\Str;

abstract class IndexConfigurator
{
    protected $name;

    protected $settings = [];

    protected $defaultMapping = [];

    public function getName()
    {
        if (isset($this->name)) {
            return $this->name;
        }

        $prefix = config('scout.prefix');

        if(!empty($prefix)) {
            $prefix .= '_';
        }

        return $prefix. Str::snake(str_replace('IndexConfigurator', '', class_basename($this)));
    }

    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @deprecated
     */
    public function getDefaultMapping()
    {
        return $this->defaultMapping;
    }
}