<?php

namespace App\Service;

use App\Entity\Park;
use Doctrine\ORM\EntityManagerInterface;

class BookingService {

    private $entityManager;
    private $park;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
        $this->park = $this->entityManager->getRepository(Park::class)->findAll();
    }

    public function newBooking($booking,$user){

        $this->setTotalEntryPrice($booking);
        $this->setBookingRef($booking, $user);
        $user->addBooking($booking);
        $this->park[0]->addBooking($booking);
        $this->park[0]->setTotalIncome();
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        
    }


    public function setTotalEntryPrice($booking){
        $entryPrice = $this->park[0]->getEntryPrice();
        $nbOfSeats = $booking->getNbOfSeats();
        $totalPrice = $entryPrice * $nbOfSeats;
        $booking->setTotalBookingPrice($totalPrice);
    }

    public function setBookingRef($booking, $user){
        $date=$booking->getDate();
        $dateString=$date->format('Y-m-d');
        $nickname = $user->getSlug();
        $random=rand(100000,999999);
        $ref = $nickname.'-'.$dateString.'-'.$random;
        $booking->setBookingRef($ref);
    }


}