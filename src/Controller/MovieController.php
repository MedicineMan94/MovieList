<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class MovieController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        
        $jsonString = file_get_contents('../resources/jsonMovieList.json');   
        $jsonData = json_decode($jsonString, true);

        return $this->render('homepage.html.twig', [
            'title' => 'MovieList',
            'movies' => $jsonData['movies']
        ]);
    }

    // #[Route('/browse/{slug}', name: 'app_browse')]
    // public function browse(string $slug = null): Response
    // {
    //     $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

    //     return $this->render('vinyl/browse.html.twig', [
    //         'genre' => $genre
    //     ]);
    // }
}
