<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculoRepository")
 */
class Vehiculo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $modelo;

    /**
     * @ORM\Column(type="integer")
     */
    private $numplazas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getNumplazas(): ?int
    {
        return $this->numplazas;
    }

    public function setNumplazas(int $numplazas): self
    {
        $this->numplazas = $numplazas;

        return $this;
    }
}
