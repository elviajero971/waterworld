<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbOfSeats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bookingRef;

    /**
     * @ORM\Column(type="float")
     */
    private $totalBookingPrice;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bookings")
     */
    private $UserHasManyBookings;

    /**
     * @ORM\ManyToOne(targetEntity=Park::class, inversedBy="bookings")
     */
    private $ParkHasManyBookings;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNbOfSeats(): ?int
    {
        return $this->nbOfSeats;
    }

    public function setNbOfSeats(int $nbOfSeats): self
    {
        $this->nbOfSeats = $nbOfSeats;

        return $this;
    }

    public function getBookingRef(): ?string
    {
        return $this->bookingRef;
    }

    public function setBookingRef(string $bookingRef): self
    {
        $this->bookingRef = $bookingRef;

        return $this;
    }

    public function getTotalBookingPrice(): ?float
    {
        return $this->totalBookingPrice;
    }

    public function setTotalBookingPrice(float $totalBookingPrice): self
    {
        $this->totalBookingPrice = $totalBookingPrice;

        return $this;
    }

    public function getUserHasManyBookings(): ?User
    {
        return $this->UserHasManyBookings;
    }

    public function setUserHasManyBookings(?User $UserHasManyBookings): self
    {
        $this->UserHasManyBookings = $UserHasManyBookings;

        return $this;
    }

    public function getParkHasManyBookings(): ?Park
    {
        return $this->ParkHasManyBookings;
    }

    public function setParkHasManyBookings(?Park $ParkHasManyBookings): self
    {
        $this->ParkHasManyBookings = $ParkHasManyBookings;

        return $this;
    }
}
