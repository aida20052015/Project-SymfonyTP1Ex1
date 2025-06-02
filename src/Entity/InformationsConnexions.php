<?php

namespace App\Entity;

use App\Repository\InformationsConnexionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationsConnexionsRepository::class)]
class InformationsConnexions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Login = null;

    #[ORM\Column(length: 255)]
    private ?string $MotdePasse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): static
    {
        $this->Login = $Login;

        return $this;
    }

    public function getMotdePasse(): ?string
    {
        return $this->MotdePasse;
    }

    public function setMotdePasse(string $MotdePasse): static
    {
        $this->MotdePasse = $MotdePasse;

        return $this;
    }
}
