<?php

namespace App\Entity;

use App\Repository\EquiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquiposRepository::class)]
class Equipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logotipo = null;

    #[ORM\Column(length: 255)]
    private ?int $puntos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getLogotipo(): ?string
    {
        return $this->logotipo;
    }

    public function setLogotipo(?string $logotipo): self
    {
        $this->logotipo = $logotipo;

        return $this;
    }

    public function getPuntos(): ?string
    {
        return $this->puntos;
    }

    public function setPuntos(?string $puntos): self
    {
        $this->puntos = $puntos;

        return $this;
    }
}
