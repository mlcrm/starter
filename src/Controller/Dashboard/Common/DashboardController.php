<?php

namespace App\Controller\Dashboard\Common;

use App\Service\DocumentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class DashboardController extends AbstractController
{
    public function __construct(
        private DocumentService $documentService,
        private BaseController $baseController,
        private TranslatorInterface $translator
    ){}

    #[Route(path: '/dashboard', name: 'dashboard', methods: ['GET'])]
    public function index(): Response
    {
        $this->documentService->setTitle($this->translator->trans('Панель управления', [], 'dashboard'));

        return $this->baseController->setOutput('content');
    }
}
