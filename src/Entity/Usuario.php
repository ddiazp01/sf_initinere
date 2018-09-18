<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $usuario;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $contraseña;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vehiculo", cascade={"persist", "remove"})
     */
    private $vehiculo;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Itinerario", inversedBy="usuarios")
     */
    private $itinerarios;

    public function __construct()
    {
        $this->itinerarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

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

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getContraseña(): ?string
    {
        return $this->contraseña;
    }

    public function setContraseña(string $contraseña): self
    {
        $this->contraseña = $contraseña;

        return $this;
    }

    public function getVehiculo(): ?Vehiculo
    {
        return $this->vehiculo;
    }

    public function setVehiculo(?Vehiculo $vehiculo): self
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * @return Collection|Itinerario[]
     */
    public function getItinerarios(): Collection
    {
        return $this->itinerarios;
    }

    public function addItinerario(Itinerario $itinerario): self
    {
        if (!$this->itinerarios->contains($itinerario)) {
            $this->itinerarios[] = $itinerario;
        }

        return $this;
    }

    public function removeItinerario(Itinerario $itinerario): self
    {
        if ($this->itinerarios->contains($itinerario)) {
            $this->itinerarios->removeElement($itinerario);
        }

        return $this;
    }
}
