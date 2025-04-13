<?php

namespace App\Entity;

use App\Repository\ResidentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResidentRepository::class)]
class Resident extends User
{
    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 20)]
    private ?string $contactNumber = null;

    #[ORM\Column(length: 20)]
    private ?string $civilStatus = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $birthDate = null;

    public function __construct()
    {
        parent::__construct();
        $this->setRoles(['ROLE_RESIDENT']);
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function getContactNumber(): ?string
    {
        return $this->contactNumber;
    }

    public function setContactNumber(string $contactNumber): static
    {
        $this->contactNumber = $contactNumber;
        return $this;
    }

    public function getCivilStatus(): ?string
    {
        return $this->civilStatus;
    }

    public function setCivilStatus(string $civilStatus): static
    {
        $this->civilStatus = $civilStatus;
        return $this;
    }

    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeImmutable $birthDate): static
    {
        $this->birthDate = $birthDate;
        return $this;
    }
}
