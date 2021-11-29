<?php

namespace App\Controller\Dashboard\Security;

use Symfony\Component\Routing\Annotation\Route;

class LogoutController
{
    #[Route(path: '/dashboard/logout', name: 'dashboard.logout', methods: ['GET'])]
    public function logout(): void {}
}
