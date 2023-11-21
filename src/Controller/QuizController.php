<?php

namespace App\Controller;

use App\Entity\Questions;
use App\Repository\AnswersRepository;
use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuizController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Environment $twig, QuestionsRepository $questionsRepository): Response
    {
        return new Response($twig->render('quiz/index.html.twig', [
            'questions' => $questionsRepository->findAll(),
        ]));
    }

    #[Route('/question/{id}', name: 'question')]
    public function show(Environment $twig, Questions $question, AnswersRepository $answersRepository): Response
    {
        return new Response($twig->render('quiz/show.html.twig', [
            'question' => $question,
            'answers' => $answersRepository->findBy(['questions' => $question]),
        ]));
    }
}