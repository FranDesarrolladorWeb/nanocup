<?php

namespace App\Entity;

use App\Repository\ClasificacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasificacionRepository::class)]
class Clasificacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_jugador = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_carrera = null;

    #[ORM\Column(nullable: true)]
    private ?int $puntos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJugador(): ?int
    {
        return $this->id_jugador;
    }

    public function setIdJugador(?int $id_jugador): self
    {
        $this->id_jugador = $id_jugador;

        return $this;
    }

    public function getIdCarrera(): ?int
    {
        return $this->id_carrera;
    }

    public function setIdCarrera(?int $id_carrera): self
    {
        $this->id_carrera = $id_carrera;

        return $this;
    }

    public function getPuntos(): ?int
    {
        return $this->puntos;
    }

    public function setPuntos(?int $puntos): self
    {
        $this->puntos = $puntos;

        return $this;
    }
}
