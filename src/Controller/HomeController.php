<?php

namespace App\Controller;

use App\Entity\Question;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //
        $questionRepo = $doctrine->getRepository(Question::class);
        $questions = $questionRepo->findAll();
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
