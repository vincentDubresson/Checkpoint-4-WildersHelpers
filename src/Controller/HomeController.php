<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Type;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Repository\PostRepository;
use App\Repository\TypeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        UserRepository $userRepository,
        PostRepository $postRepository,
        TypeRepository $typeRepository,
    ): Response {
        $offer = $typeRepository->findOneBy(['name' => 'offre']);
        $demand = $typeRepository->findOneBy(['name' => 'demande']);

        $offers = $postRepository->findByType($offer);
        $demands = $postRepository->findByType($demand);
        $wilders = $userRepository->findBy([], ['id' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'wilders' => $wilders,
            'offers' => $offers,
            'demands' => $demands,
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(
        Request $request,
        ContactRepository $contactRepository,
    ): Response {

        $contactComment = new Contact();
        $form = $this->createForm(ContactType::class, $contactComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                $contactRepository->add($contactComment, true);
                return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('home/contact.html.twig', [
            'form' => $form,
        ]);
    }
}
