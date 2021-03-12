<?php

namespace App\Service;
use App\Entity\Attraction;
use App\Entity\Park;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\BookingService;
class ParkService{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function showAllAttractions(){
        $attractions = $this->entityManager->getRepository((Attraction::class))->findAll();
        return $attractions;
    }

    public function showOneAttraction($slug){
        $attraction = $this->entityManager->getRepository((Attraction::class))->findOneBySlug($slug);
        return $attraction;
    }

    public function getTotalIncome(){
        $park = $this->entityManager->getRepository((Park::class))->findAll();
        $totalIncome = $park[0]->getTotalIncome();
        return $totalIncome;
    }


}