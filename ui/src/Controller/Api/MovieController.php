<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\Service\Interface\MovieServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    public function __construct(
        private readonly MovieServiceInterface $movieService,
        private readonly LoggerInterface $logger,
    ) {
    }

    #[Route('/api/movie/', name: 'movie.api.getAll', methods: ['GET'])]
    public function getAll(): Response
    {
        $movies = $this->movieService->getAll();

        return $this->json($movies);
    }

    #[Route('/api/movie/{id}', name: 'movie.api.get', methods: ['GET'])]
    public function get(int $id): Response
    {
        $movie = $this->movieService->get($id);

        return $this->json($movie);
    }
}