<?php

namespace App\Core;

class Container
{
    private $instances = [];

    public function get($class)
    {
        if (!isset($this->instances[$class])) {
            $this->instances[$class] = new $class($this);
        }

        return $this->instances[$class];
    }
}
