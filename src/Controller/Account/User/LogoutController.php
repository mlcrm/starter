<?php

namespace App\Controller\Account\User;

use Symfony\Component\Routing\Annotation\Route;

class LogoutController
{
    #[Route(path: '/logout', name: 'account.logout', methods: ['GET'])]
    public function logout(): void {}
}
