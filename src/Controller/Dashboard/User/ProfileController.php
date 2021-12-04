<?php

namespace App\Controller\Dashboard\User;

use App\Controller\Dashboard\Common\BaseController;
use App\Form\Dashboard\User\ProfileType;
use App\Service\DocumentService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    public function __construct(
        private BaseController $baseController,
        private DocumentService $documentService,
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher,
    ){}

    #[Route(path: '/dashboard/profile', name: 'dashboard.profile.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request): Response
    {
        $this->documentService
            ->setTitle('Редактирование профиля')
            ->addBreadcrumbsItem('Панель управления', $this->generateUrl('dashboard'))
            ->addBreadcrumbsItem('Профиль')
        ;

        $user = $this->getUser();
        $form = $this->createForm(ProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            if (null !== $plainPassword = $form->get('password')->getData()){
                $user->setPassword($this->passwordHasher->hashPassword($user, $plainPassword));
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                return $this->redirectToRoute('dashboard.logout');
            }
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $this->addFlash('success', 'Профиль успешно изменен!');
        }

        $data['form'] = $form->createView();
        $content = $this->renderView('dashboard/user/profile_edit.html.twig', $data);

        return $this->baseController->setOutput($content);
    }
}
