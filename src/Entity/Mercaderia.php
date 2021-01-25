<?php

namespace App\Entity;

use App\Repository\MercaderiaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MercaderiaRepository::class)
 */
class Mercaderia
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
     * @ORM\Column(type="string", length=5)
     */
    private $code;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $alto;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $ancho;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $profundo;

    /**
     * @ORM\ManyToMany(targetEntity=Material::class, mappedBy="id_mercaderia")
     */
    private $materials;

    /**
     * @ORM\ManyToOne(targetEntity=Provider::class, inversedBy="id_material")
     * @ORM\JoinColumn(nullable=false)
     */
    private $provider;

    /**
     * @ORM\OneToMany(targetEntity=Composicion::class, mappedBy="id_mercaderia", orphanRemoval=true)
     */
    private $composicions;


    public function __construct()
    {
        $this->materials = new ArrayCollection();
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getAlto(): ?string
    {
        return $this->alto;
    }

    public function setAlto(string $alto): self
    {
        $this->alto = $alto;

        return $this;
    }

    public function getAncho(): ?string
    {
        return $this->ancho;
    }

    public function setAncho(string $ancho): self
    {
        $this->ancho = $ancho;

        return $this;
    }

    public function getProfundo(): ?string
    {
        return $this->profundo;
    }

    public function setProfundo(string $profundo): self
    {
        $this->profundo = $profundo;

        return $this;
    }

    /**
     * @return Collection|Material[]
     */
    public function getMaterials(): Collection
    {
        return $this->materials;
    }

    public function addMaterial(Material $material): self
    {
        if (!$this->materials->contains($material)) {
            $this->materials[] = $material;
            $material->addIdMercaderium($this);
        }

        return $this;
    }

    public function removeMaterial(Material $material): self
    {
        if ($this->materials->removeElement($material)) {
            $material->removeIdMercaderium($this);
        }

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

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
            $composicion->setIdMercaderia($this);
        }

        return $this;
    }

    public function removeComposicion(Composicion $composicion): self
    {
        if ($this->composicions->removeElement($composicion)) {
            // set the owning side to null (unless already changed)
            if ($composicion->getIdMercaderia() === $this) {
                $composicion->setIdMercaderia(null);
            }
        }

        return $this;
    }

}
