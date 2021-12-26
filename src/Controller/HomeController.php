<?php

namespace App\Controller;

use App\Service\DocumentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    public function __construct(
        private DocumentService $documentService,
        private TranslatorInterface $translator
    ){}

    #[Route(path: '/', name: 'homepage', methods: ['GET'])]
    public function index(): Response
    {
        $this->documentService
            ->setTitle($this->translator->trans('Template A', [], 'messages'))
            ->addEntrypoint('app')
        ;

        return $this->render('homepage.html.twig');
    }
}
