<?php

namespace App\Service;

use Psr\Container\ContainerInterface;

class LoaderService
{
    public function __construct(
        private ContainerInterface $locator){}

    public function loadController(string $name, string $method = 'index', array $params = []): string
    {
        return call_user_func_array([$this->locator->get($name), $method], $params);
    }
}
