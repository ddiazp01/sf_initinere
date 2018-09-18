<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItinerarioRepository")
 */
class Itinerario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $horasalida;

    /**
     * @ORM\Column(type="time")
     */
    private $horavuelta;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $diasemana;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="itinerarios")
     */
    private $usuarios;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ciudad", inversedBy="itinerarios")
     */
    private $origen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ciudad", inversedBy="itinerarios")
     */
    private $destino;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ciudad")
     */
    private $pintermedios;


    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->pintermedios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHorasalida(): ?\DateTimeInterface
    {
        return $this->horasalida;
    }

    public function setHorasalida(\DateTimeInterface $horasalida): self
    {
        $this->horasalida = $horasalida;

        return $this;
    }

    public function getHoravuelta(): ?\DateTimeInterface
    {
        return $this->horavuelta;
    }

    public function setHoravuelta(\DateTimeInterface $horavuelta): self
    {
        $this->horavuelta = $horavuelta;

        return $this;
    }

    public function getDiasemana(): ?string
    {
        return $this->diasemana;
    }

    public function setDiasemana(string $diasemana): self
    {
        $this->diasemana = $diasemana;

        return $this;
    }

    /**
     * @return Collection|Usuario[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(User $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->addItinerario($this);
        }

        return $this;
    }

    public function removeUsuario(User $usuario): self
    {
        if ($this->usuarios->contains($usuario)) {
            $this->usuarios->removeElement($usuario);
            $usuario->removeItinerario($this);
        }

        return $this;
    }

    public function getOrigen(): ?Ciudad
    {
        return $this->origen;
    }

    public function setOrigen(?Ciudad $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?Ciudad
    {
        return $this->destino;
    }

    public function setDestino(?Ciudad $destino): self
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * @return Collection|Ciudad[]
     */
    public function getPintermedios(): Collection
    {
        return $this->pintermedios;
    }

    public function addPintermedio(Ciudad $pintermedio): self
    {
        if (!$this->pintermedios->contains($pintermedio)) {
            $this->pintermedios[] = $pintermedio;
        }

        return $this;
    }

    public function removePintermedio(Ciudad $pintermedio): self
    {
        if ($this->pintermedios->contains($pintermedio)) {
            $this->pintermedios->removeElement($pintermedio);
        }

        return $this;
    }

}
