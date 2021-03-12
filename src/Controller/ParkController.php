<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ParkService;

class ParkController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(ParkService $parkService): Response
    {
        $totalIncome = $parkService->getTotalIncome();
        return $this->render('park/home.html.twig', [
            'totalIncome' => $totalIncome,
        ]);
    }

    /**
     * @Route("/attractions", name="attractions")
     */
    public function index(ParkService $parkService): Response
    {
        $attractions = $parkService->showAllAttractions();
        return $this->render('park/attractions_index.html.twig', [
            'attractions' => $attractions,
        ]);
    }

    /**
     * @Route("/attraction/{slug}", name="show")
     */
    public function show(ParkService $parkService, $slug): Response
    {
        $attraction = $parkService->showOneAttraction($slug);
        return $this->render('park/attraction_show.html.twig', [
            'attraction' => $attraction,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('park/contact.html.twig', [
            'controller_name' => 'ParkController',
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('park/about.html.twig', [
            'controller_name' => 'ParkController',
        ]);
    }

    

    
}
