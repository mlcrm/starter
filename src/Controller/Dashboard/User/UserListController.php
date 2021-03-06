<?php

namespace App\Controller\Dashboard\User;

use App\Controller\Dashboard\Common\BaseController;
use App\Service\DocumentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class UserListController extends AbstractController
{
    public function __construct(
        private DocumentService $documentService,
        private BaseController $baseController,
        private TranslatorInterface $translator
    ){}

    #[Route(path: '/dashboard/user/list', name: 'dashboard.user.list', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $this->documentService
            ->setTitle($this->translator->trans('Users list', [], 'dashboard'))
            ->addBreadcrumbsItem('Control Panel', $this->generateUrl('dashboard'))
            ->addBreadcrumbsItem('Users list')
        ;

        $data['list'] = 'list';
        $content = $this->renderView('dashboard/user/user_list.html.twig', $data);
        return $this->baseController->setOutput($content);
    }
}
