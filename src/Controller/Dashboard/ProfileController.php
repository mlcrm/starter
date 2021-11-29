<?php

namespace App\Controller\Dashboard;

use App\Controller\Dashboard\Common\BaseController;
use App\Form\Dashboard\ProfileType;
use App\Service\DocumentService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ProfileController extends AbstractController
{
    public function __construct(
        private BaseController $baseController,
        private DocumentService $documentService,
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher,
        private TranslatorInterface $translator
    ){}

    #[Route(path: '/dashboard/profile', name: 'dashboard.profile.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request): Response
    {
        $title = $this->translator->trans('Профиль', [], 'dashboard'). ' | '.
                    $this->getUser()->getFirstName(). ' '. $this->getUser()->getLastName();

        $this->documentService
            ->setTitle($title)
            ->addBreadcrumbsItem('Панель управления', $this->generateUrl('dashboard'))
            ->addBreadcrumbsItem('Профиль')
        ;

        $form = $this->createForm(ProfileType::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            if (null !== $plainPassword = $form->get('password')->getData()){
                $this->getUser()->setPassword($this->passwordHasher->hashPassword($this->getUser(), $plainPassword));
            }
            $this->entityManager->persist($this->getUser());
            $this->entityManager->flush();
            $this->addFlash('success', 'Профиль успешно изменен!');
        }

        $data['form'] = $form->createView();
        $content = $this->renderView('dashboard/profile/edit.html.twig', $data);

        return $this->baseController->setOutput($content);
    }
}
