<?php

namespace App\Controller\Dashboard\Common;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FooterController extends AbstractController
{
    public function index(): string
    {
        return $this->renderView('dashboard/common/footer.html.twig');
    }
}
