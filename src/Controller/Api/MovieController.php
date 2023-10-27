<?php declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route(
        path: '/api/movie/{title}',
        name: 'movie',
        defaults: ['title' => null],
        methods: ['GET']
    )]
    public function getMovies(?string $title): Response
    {
        return $this->json([
            'message' => 'Testing the API Controller',
            'data' => [
                'id' => 1,
                'title' => $title,
                'description' => 'A great movie!'
            ]
        ]);
    }
}