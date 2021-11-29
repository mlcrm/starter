<?php

namespace App\Service\Breadcrumb;

class Breadcrumb
{
    public function __construct(
        private string $title,
        private ?string $url
    ){}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
