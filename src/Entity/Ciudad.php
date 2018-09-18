<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CiudadRepository")
 */
class Ciudad
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
     * @ORM\OneToMany(targetEntity="App\Entity\Itinerario", mappedBy="origen")
     */
    private $itinerarios;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provincia", inversedBy="ciudades")
     * @ORM\JoinColumn(nullable=false)
     */
    private $provincia;

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
            $itinerario->setOrigen($this);
        }

        return $this;
    }

    public function removeItinerario(Itinerario $itinerario): self
    {
        if ($this->itinerarios->contains($itinerario)) {
            $this->itinerarios->removeElement($itinerario);
            // set the owning side to null (unless already changed)
            if ($itinerario->getOrigen() === $this) {
                $itinerario->setOrigen(null);
            }
        }

        return $this;
    }

    public function getProvincia(): ?Provincia
    {
        return $this->provincia;
    }

    public function setProvincia(?Provincia $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }
}
