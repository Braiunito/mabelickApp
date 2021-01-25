<?php

namespace App\Entity;

use App\Repository\ComposicionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComposicionRepository::class)
 */
class Composicion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $unidad;

    /**
     * @ORM\ManyToOne(targetEntity=Material::class, inversedBy="composicions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_material;

    /**
     * @ORM\ManyToOne(targetEntity=Mercaderia::class, inversedBy="composicions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_mercaderia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnidad(): ?string
    {
        return $this->unidad;
    }

    public function setUnidad(string $unidad): self
    {
        $this->unidad = $unidad;

        return $this;
    }

    public function getIdMaterial(): ?Material
    {
        return $this->id_material;
    }

    public function setIdMaterial(?Material $id_material): self
    {
        $this->id_material = $id_material;

        return $this;
    }

    public function getIdMercaderia(): ?Mercaderia
    {
        return $this->id_mercaderia;
    }

    public function setIdMercaderia(?Mercaderia $id_mercaderia): self
    {
        $this->id_mercaderia = $id_mercaderia;

        return $this;
    }
}
