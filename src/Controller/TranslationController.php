<?php

namespace App\Controller;

use App\Application\Service\TranslationService;
use App\View\TranslationPresenter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TranslationController extends AbstractController
{
    protected TranslationService $translationService;
    protected TranslationPresenter $translationPresenter;

    public function __construct(TranslationService $translationService, TranslationPresenter $translationPresenter)
    {
        $this->translationService = $translationService;
        $this->translationPresenter = $translationPresenter;
    }

    #[Route('/translation', methods: ['POST'])]
    public function create(Request $request): Response
    {
        return $this->json(['todo']);
    }

    #[Route('/translation/{id}')]
    public function get(string $id): Response
    {
        return $this->json($this->translationPresenter->presentTranslation($this->translationService->get($id)));
    }

    #[Route('/translation')]
    public function getAll(): Response
    {
        return $this->json($this->translationPresenter->presentTranslations($this->translationService->getAll()));
    }

    #[Route('/translation/{id}', methods: ['PUT'])]
    public function update(string $id): Response
    {
        return $this->json(['todo']);
    }

    #[Route('/translation/{id}', methods: ['DELETE'])]
    public function delete(string $id): Response
    {
        return $this->json(['todo']);
    }
}
