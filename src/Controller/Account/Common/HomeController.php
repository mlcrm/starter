<?php

namespace App\Controller\Account\Common;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/account', name: 'account', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('account/common/account.html.twig');
    }
}
