<?php

namespace App\Controller\Dashboard;

use App\Controller\Dashboard\Common\BaseController;
use App\Entity\User;
use App\Service\DocumentService;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/dashboard/user')]
class UserController extends AbstractController
{
    public function __construct(
        private DocumentService $documentService,
        private BaseController $baseController,
        private UserService $userService
    ){}

    #[Route(path: '', name: 'dashboard.user.index', methods: ['GET'])]
    public function index(): Response
    {
        $this->documentService
            ->setTitle('Список пользователей')
            ->addBreadcrumbsItem('Панель управления', $this->generateUrl('dashboard'))
            ->addBreadcrumbsItem('Пользователи')
        ;

        $data['users'] = $this->userService->getUsers();
        $content = $this->renderView('dashboard/user/index.html.twig', $data);

        return $this->baseController->setOutput($content);
    }

    #[Route(path: '/new', name: 'dashboard.user.new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $data['content'] = 'content';
        $content = $this->renderView('dashboard/user/new.html.twig', $data);

        return $this->baseController->setOutput($content);
    }

    #[Route(path: '/{id}/edit', name: 'dashboard.user.edit', methods: ['GET', 'POST'])]
    public function edit(User $user): Response
    {
        $data['content'] = 'content';
        $content = $this->renderView('dashboard/user/edit.html.twig', $data);

        return $this->baseController->setOutput($content);
    }

    #[Route(path: '/{id}/delete', name: 'dashboard.user.edit', methods: ['POST'])]
    public function delete(User $user): Response
    {
        $data['content'] = 'content';
        $content = $this->renderView('dashboard/user/edit.html.twig', $data);

        return $this->baseController->setOutput($content);
    }
}
