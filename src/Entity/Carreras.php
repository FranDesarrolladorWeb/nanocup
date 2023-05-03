<?php

namespace App\Entity;

use App\Repository\CarrerasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarrerasRepository::class)]
class Carreras
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $circuito = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ganador = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $n_vueltas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getCircuito(): ?string
    {
        return $this->circuito;
    }

    public function setCircuito(?string $circuito): self
    {
        $this->circuito = $circuito;

        return $this;
    }

    public function getGanador(): ?string
    {
        return $this->ganador;
    }

    public function setGanador(?string $ganador): self
    {
        $this->ganador = $ganador;

        return $this;
    }

    public function getNVueltas(): ?string
    {
        return $this->n_vueltas;
    }

    public function setNVueltas(?string $n_vueltas): self
    {
        $this->n_vueltas = $n_vueltas;

        return $this;
    }
}
