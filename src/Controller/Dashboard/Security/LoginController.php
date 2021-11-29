<?php

namespace App\Controller\Dashboard\Security;

use App\Service\DocumentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\Translation\TranslatorInterface;

class LoginController extends AbstractController
{
    public function __construct(
        private DocumentService $documentService,
        private TranslatorInterface $translator
    ){}

    #[Route(path: '/dashboard/login', name: 'dashboard.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $this->documentService
            ->setTitle($this->translator->trans('Вход в панель управления', [], 'dashboard'))
            ->setRobots('noindex')
            ->addEntrypoint('dashboard')
        ;

        $data['error'] = $authenticationUtils->getLastAuthenticationError();
        $data['lastUsername'] = $authenticationUtils->getLastUsername();

        return $this->render('dashboard/security/login.html.twig', $data);
    }
}
