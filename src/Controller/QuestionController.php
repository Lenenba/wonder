<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/question/ask', name: 'question_form')]
    public function index(Request $request, EntityManagerInterface  $em): Response
    {
        $question = new Question();
        $formQuestion = $this->createForm(QuestionType::class, $question);
        $formQuestion->handleRequest($request);

        if ($formQuestion->isSubmitted() && $formQuestion->isValid()) {
            $question->setNbrOfResponse(0);
            $question->setRating(0);
            $question->setCreatedAt(new \DateTimeImmutable());

            $em->persist($question);
            $em->flush();
            $this->addFlash('succes', 'votre question a bien ete ajoutee');
        
            return  $this->redirectToRoute('home');
        }
        
        return $this->render('question/index.html.twig', [
            'form' => $formQuestion->createView(),
        ]);
    }

    #[Route('/question/{id}', name: 'question_show')]
    public function show(Request $request, string $id): Response
    {
        $question = [
                'id' => '2',
                'title' => 'Je suis une super question',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem quia eaque earum saepe natus aspernatur maxime, tenetur sequi officia dolore quo cum reprehenderit quasi aliquid iure quibusdam nisi. Facere, amet.',
                'rating' => 20,
                'author' => [
                    'name' => 'jean Dupont',
                    'avatar' => 'https://randomuser.me/api/portraits/men/49.jpg'
                ],
                'nbrOfResponse' => 15
            ];

        return $this->render('question/show.html.twig', [
            'question' => $question,
        ]);
    }
}
