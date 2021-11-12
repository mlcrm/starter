<?php

namespace App\Controller\Dashboard\Common;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SidebarController extends AbstractController
{
    public function index(): string
    {
        return $this->renderView('dashboard/common/sidebar/sidebar.html.twig');
    }
}
