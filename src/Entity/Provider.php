<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProviderRepository::class)
 */
class Provider
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
     * @ORM\OneToMany(targetEntity=Mercaderia::class, mappedBy="provider", orphanRemoval=true)
     */
    private $id_material;

    public function __construct()
    {
        $this->id_material = new ArrayCollection();
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

    /**
     * @return Collection|Mercaderia[]
     */
    public function getIdMaterial(): Collection
    {
        return $this->id_material;
    }

    public function addIdMaterial(Mercaderia $idMaterial): self
    {
        if (!$this->id_material->contains($idMaterial)) {
            $this->id_material[] = $idMaterial;
            $idMaterial->setProvider($this);
        }

        return $this;
    }

    public function removeIdMaterial(Mercaderia $idMaterial): self
    {
        if ($this->id_material->removeElement($idMaterial)) {
            // set the owning side to null (unless already changed)
            if ($idMaterial->getProvider() === $this) {
                $idMaterial->setProvider(null);
            }
        }

        return $this;
    }
}
