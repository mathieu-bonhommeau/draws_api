<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/comment', name: 'app_comment', methods: ['GET'])]
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->json($commentRepository->findAll());
    }
}
