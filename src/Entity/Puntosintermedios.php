<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PuntosintermediosRepository")
 */
class Puntosintermedios
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

   

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Itinerario", mappedBy="puntosintermedio")
     */
    private $itinerarios;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ciudad", inversedBy="puntosintermedios")
     */
    private $ciudad;

    public function __construct()
    {
        $this->itinerarios = new ArrayCollection();
        $this->ciudad = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $itinerario->addPuntosintermedio($this);
        }

        return $this;
    }

    public function removeItinerario(Itinerario $itinerario): self
    {
        if ($this->itinerarios->contains($itinerario)) {
            $this->itinerarios->removeElement($itinerario);
            $itinerario->removePuntosintermedio($this);
        }

        return $this;
    }

    /**
     * @return Collection|Ciudad[]
     */
    public function getCiudad(): Collection
    {
        return $this->ciudad;
    }

    public function addCiudad(Ciudad $ciudad): self
    {
        if (!$this->ciudad->contains($ciudad)) {
            $this->ciudad[] = $ciudad;
        }

        return $this;
    }

    public function removeCiudad(Ciudad $ciudad): self
    {
        if ($this->ciudad->contains($ciudad)) {
            $this->ciudad->removeElement($ciudad);
        }

        return $this;
    }
}
