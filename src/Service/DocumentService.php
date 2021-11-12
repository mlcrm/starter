<?php

namespace App\Service;

class DocumentService
{
    private string $direction = 'ltr';
    private string $lang = 'ru';
    private string $title = 'Шаблон А';
    private string $description = 'Стартовый шаблон версии А';
    private string $keywords = 'стартовый, шаблон';
    private string $robots = 'index, follow, all';
    private string $author = 'Mutus Liber';
    private string $favicon = 'images/favicon.ico';
    private string $favicon192 = 'images/favicon192.png';
    private string $manifest = 'images/manifest.json';
    private string $themeColor = '#000000';
    private array $entrypoints = [];

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function getRobots(): string
    {
        return $this->robots;
    }

    public function setRobots(string $robots): self
    {
        $this->robots = $robots;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getFavicon(): string
    {
        return $this->favicon;
    }

    public function setFavicon(string $favicon): self
    {
        $this->favicon = $favicon;
        return $this;
    }

    public function getFavicon192(): string
    {
        return $this->favicon192;
    }

    public function setFavicon192(string $favicon192): self
    {
        $this->favicon192 = $favicon192;
        return $this;
    }

    public function getManifest(): string
    {
        return $this->manifest;
    }

    public function setManifest(string $manifest): self
    {
        $this->manifest = $manifest;
        return $this;
    }

    public function getThemeColor(): string
    {
        return $this->themeColor;
    }

    public function setThemeColor(string $themeColor): self
    {
        $this->themeColor = $themeColor;
        return $this;
    }

    public function getEntrypoints(): array
    {
        return $this->entrypoints;
    }

    public function addEntrypoint(string $entrypoint): self
    {
        $this->entrypoints[] = $entrypoint;
        return $this;
    }
}
