<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie')]
class MovieController extends AbstractController
{
    #[Route('/', name: 'Movies')]
    public function index(): Response
    {
        $movies = [
            ['title' => 'Avengers: End Game'],
            ['title' => 'Sonic'],
            ['title' => 'Mario Bros.'],
        ];

        return $this->render('movie/index.twig', ['movies' => $movies]);
    }

    #[Route('/{id}', name: 'Movie')]
    public function movie(int $id): Response
    {
        $movie = [
            'id' => $id,
            'title' => 'Avengers',
            'description' => 'An awesome movie!'
        ];

        return $this->render('movie/movie.twig', $movie);
    }
}
