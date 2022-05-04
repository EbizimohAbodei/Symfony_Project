<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;



class QuestionController extends AbstractController
{
    #[Route('/', methods: ['GET'], name:'index')]

    public function number(): Response
    {
        $text = 'What a bewitching controller we have conjured';

        // return new Response(
        //     '<html><body> '.$text.'</body></html>'
        // );
        return $this->render('question/homepage.html.twig');
    }

    #[Route('/show', methods: ['GET'], name:"questions")]

    public function show (): Response {
        // $title = str_replace('-', ' ', $slug);
        // die('not working page');
        $answers = ['Dog', 'Cat', 'Snake'];

        $question = 'What is your favourite pet';

        // $about = $slug ? u(str_replace('-', '', $slug))->title(true) : null;
    
        // return new Response ('<html><body> <H1>Future page to show a questions</h1></body></html>');
        // return new Response('Mixed-Taped: Surely, not fancy looking page');

        return $this->render('question/show.html.twig', [
            'question' => $question,
            'answers' => $answers
        ]);
    }

    #[Route('/questions/{slug}', name:"question")]

    public function questions (string $slug = null): Response {
        // $title = ucwords($slug);
        // // die('not working page');

        $question = 'How to tie my shoe with magic:' . ' ' . 'this is the garbage you typed in the browser' . '%s';

        //Turns the first letters of message after slug to capital letters
        $about = $slug ? u(ucwords($slug))->title(true) : null;
    
        return new Response ('<html><body>' . sprintf($question, $about) . '</body></html>');
        // return new Response('Mixed-Taped: Surely, not fancy looking page');
    }
}