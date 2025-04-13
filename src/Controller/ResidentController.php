<?php

namespace App\Controller;

use App\Entity\Resident;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResidentController extends AbstractController
{
    #[Route('/residents', name: 'app_residents')]
    public function index(EntityManagerInterface $em): Response
    {
        $residents = $em->getRepository(Resident::class)->findAll();
        
        return $this->render('resident/index.html.twig', [
            'residents' => $residents
        ]);
    }
}