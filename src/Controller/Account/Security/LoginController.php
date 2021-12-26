<?php

namespace App\Controller\Account\Security;

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

    #[Route(path: '/login', name: 'account.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $this->documentService
            ->setTitle($this->translator->trans('Login to your personal account', [], 'account'))
            ->setRobots('noindex')
            ->addEntrypoint('account')
        ;

        $data['error'] = $authenticationUtils->getLastAuthenticationError();
        $data['lastUsername'] = $authenticationUtils->getLastUsername();

        return $this->render('account/security/login.html.twig', $data);
    }
}
