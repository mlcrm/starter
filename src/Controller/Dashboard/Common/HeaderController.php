<?php

namespace App\Controller\Dashboard\Common;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HeaderController extends AbstractController
{
    public function index(): string
    {
        return $this->renderView('dashboard/common/header.html.twig');
    }
}
