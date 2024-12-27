<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\MicroPost;
use App\Entity\UserProfile;
use Doctrine\ORM\EntityManager;
use App\Repository\CommentRepository;
use App\Repository\MicroPostRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserProfileRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    private array $messages = [
        ['message' => 'Hello', 'created' => '2022/06/12'],
        ['message' => 'Hi', 'created' => '2022/04/12'],
        ['message' => 'Bye!', 'created' => '2021/05/12']
      ];
#[Route('/', name: 'app_index')]
      public function index(MicroPostRepository $posts, CommentRepository $comment, EntityManagerInterface $entityManager): Response
      {
        // $post = new MicroPost();
        // $post->setTitle('Hello');
        // $post->setText('Hello');
        // $post->setCreated(new DateTime());

        // $post = $posts->find(8);

        // $comment = new Comment();
        // $comment->setText('TO jest ósmy post');
        // $comment->setPost($post);
        // $post->addComment($comment);
        // // $posts->add($post, true);

        // $entityManager->persist($comment);
        // $entityManager->flush();


        // $user = new User();
        // $user->setEmail('email@email.com');
        // $user->setPassword('123456');

        // $profile = new UserProfile();
        // $profile->setUser($user);
        
        // $entityManager->persist($profile);
        // $entityManager->flush();

        // $profile = $profiles->find(1);

        // $entityManager->remove($profile);
        // $entityManager->flush();

        return $this->render(
          'hello/index.html.twig'
          
          );
          }
        }