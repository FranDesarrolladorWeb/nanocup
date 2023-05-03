<?php

namespace App\Entity;

use App\Repository\ParticipacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipacionRepository::class)]
class Participacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?int $id_jugador = null;

    #[ORM\Column(length: 255)]
    private ?int $id_equipo = null;
    
    #[ORM\Column(length: 255)]
    private ?int $id_carrera = null;

    #[ORM\Column(length: 255)]
    private ?int $tiempo_carrera = null;

    #[ORM\Column(length: 255)]
    private ?int $posicion_carrera = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJugador(): ?string
    {
        return $this->id_jugador;
    }

    public function setIdJugador(string $id_jugador): self
    {
        $this->id_jugador = $id_jugador;

        return $this;
    }

    public function getIdEquipo(): ?string
    {
        return $this->id_equipo;
    }

    public function setIdEquipo(string $id_equipo): self
    {
        $this->id_equipo = $id_equipo;

        return $this;
    }

    public function getIdCarrera(): ?string
    {
        return $this->id_carrera;
    }

    public function setIdCarrera(string $id_carrera): self
    {
        $this->id_carrera = $id_carrera;

        return $this;
    }

    public function getTiempoCarrera(): ?string
    {
        return $this->tiempo_carrera;
    }

    public function setTiempoCarrera(string $tiempo_carrera): self
    {
        $this->tiempo_carrera = $tiempo_carrera;

        return $this;
    }

    public function getPosicionCarrera(): ?string
    {
        return $this->posicion_carrera;
    }

    public function setPosicionCarrera(string $posicion_carrera): self
    {
        $this->posicion_carrera = $posicion_carrera;

        return $this;
    }
}
