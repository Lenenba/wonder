<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $questions = [
            [
                'id' => '1',
                'title' => 'Je suis une super question',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem quia eaque earum saepe natus aspernatur maxime, tenetur sequi officia dolore quo cum reprehenderit quasi aliquid iure quibusdam nisi. Facere, amet.',
                'rating' => 20,
                'author' => [
                    'name' => 'jean Dupont',
                    'avatar' => 'https://randomuser.me/api/portraits/men/49.jpg'
                ],
                'nbrOfResponse' => 15
            ],
            [
                'id' => '2',
                'title' => 'Je suis une super question 2',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem quia eaque earum saepe natus aspernatur maxime, tenetur sequi officia dolore quo cum reprehenderit quasi aliquid iure quibusdam nisi. Facere, amet.',
                'rating' => 10,
                'author' => [
                    'name' => 'julie Dupont',
                    'avatar' => 'https://randomuser.me/api/portraits/women/88.jpg'
                ],
                'nbrOfResponse' => 5
            ],
            [
                'id' => '3',
                'title' => 'Je suis une super question 3',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem quia eaque earum saepe natus aspernatur maxime, tenetur sequi officia dolore quo cum reprehenderit quasi aliquid iure quibusdam nisi. Facere, amet.',
                'rating' => -2,
                'author' => [
                    'name' => 'jean Pierre',
                    'avatar' => 'https://randomuser.me/api/portraits/men/80.jpg'
                ],
                'nbrOfResponse' => 3
            ]
        ];
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
