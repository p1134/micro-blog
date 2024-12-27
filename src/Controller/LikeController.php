<?php

namespace App\Controller;

use App\Entity\MicroPost;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LikeController extends AbstractController
{
    #[Route('/like/{id}', name: 'app_like')]
    public function like(MicroPost $post, EntityManagerInterface $entityManager, Request $request): Response
    {
        $currentUser = $this->getUser();
        $post->addLikedBy($currentUser);
        $entityManager->persist($post);
        $entityManager->flush();

        return $this->redirect($request->headers->get('referer'));
    }
    #[Route('/unlike/{id}', name: 'app_unlike')]
    public function unlike(MicroPost $post, EntityManagerInterface $entityManager, Request $request): Response
    {
        $currentUser = $this->getUser();
        $post->removeLikedBy($currentUser);
        $entityManager->persist($post);
        $entityManager->flush();

        return $this->redirect($request->headers->get('referer'));
    }
}
