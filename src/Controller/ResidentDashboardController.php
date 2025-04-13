<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/resident')]
#[IsGranted('ROLE_RESIDENT')]
class ResidentDashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_resident_dashboard')]
    public function index(): Response
    {
        return $this->render('resident/dashboard.html.twig', [
            'resident' => $this->getUser(),
        ]);
    }
} 