<?php

namespace App\Entity;

use App\Repository\MaterialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterialRepository::class)
 */
class Material
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Mercaderia::class, inversedBy="materials")
     */
    private $id_mercaderia;

    /**
     * @ORM\OneToMany(targetEntity=Composicion::class, mappedBy="id_material", orphanRemoval=false)
     */
    private $composicions;

    public function __construct()
    {
        $this->id_mercaderia = new ArrayCollection();
        $this->composicions = new ArrayCollection();
    }

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Mercaderia[]
     */
    public function getIdMercaderia(): Collection
    {
        return $this->id_mercaderia;
    }

    public function addIdMercaderium(Mercaderia $idMercaderium): self
    {
        if (!$this->id_mercaderia->contains($idMercaderium)) {
            $this->id_mercaderia[] = $idMercaderium;
        }

        return $this;
    }

    public function removeIdMercaderium(Mercaderia $idMercaderium): self
    {
        $this->id_mercaderia->removeElement($idMercaderium);

        return $this;
    }

    /**
     * @return Collection|Composicion[]
     */
    public function getComposicions(): Collection
    {
        return $this->composicions;
    }

    public function addComposicion(Composicion $composicion): self
    {
        if (!$this->composicions->contains($composicion)) {
            $this->composicions[] = $composicion;
            $composicion->setIdMaterial($this);
        }

        return $this;
    }

    public function removeComposicion(Composicion $composicion): self
    {
        if ($this->composicions->removeElement($composicion)) {
            // set the owning side to null (unless already changed)
            if ($composicion->getIdMaterial() === $this) {
                $composicion->setIdMaterial(null);
            }
        }

        return $this;
    }
}
