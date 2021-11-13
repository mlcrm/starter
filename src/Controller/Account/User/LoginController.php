<?php

namespace App\Controller\Account\User;

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
            ->setTitle($this->translator->trans('Вход в личный кабинет', [], 'account'))
            ->setRobots('noindex')
            ->addEntrypoint('account')
        ;

        $data['error'] = $authenticationUtils->getLastAuthenticationError();
        $data['lastUsername'] = $authenticationUtils->getLastUsername();

        return $this->render('account/user/login.html.twig', $data);
    }
}
