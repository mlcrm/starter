<?php

namespace App\Controller\Dashboard\Common;

use App\Service\DocumentService;
use App\Service\LoaderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController
{
    public function __construct(
        private DocumentService $documentService,
        private LoaderService $loaderService
    ){}

    public function setOutput(string $content = null): Response
    {
        $this->documentService->addEntrypoint('dashboard');

        $data['sidebar'] = $this->loaderService->loadController(SidebarController::class);
        $data['header'] = $this->loaderService->loadController(HeaderController::class);
        $data['content'] = $content;
        $data['footer'] = $this->loaderService->loadController(FooterController::class);

        return $this->render('dashboard/common/dashboard.html.twig', $data);
    }
}
