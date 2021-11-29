<?php

namespace App\Service\Breadcrumb;

class BreadcrumbService
{
    private array $breadcrumbs = [];

    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    public function addItem(string $title, string $url = null): self
    {
        $this->breadcrumbs[] = new Breadcrumb($title, $url);
        return $this;
    }
}
