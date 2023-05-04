<?php

namespace App\Entity;

use App\Repository\PilotosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PilotosRepository::class)]
class Pilotos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $dorsal = null;

    #[ORM\Column(length: 255)]
    private ?int $puntos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDorsal(): ?string
    {
        return $this->dorsal;
    }

    public function setDorsal(string $dorsal): self
    {
        $this->dorsal = $dorsal;

        return $this;
    }

    public function getPuntos(): ?string
    {
        return $this->puntos;
    }

    public function setPuntos(string $puntos): self
    {
        $this->puntos = $puntos;

        return $this;
    }
}
