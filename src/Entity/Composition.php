<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompositionRepository::class)
 */
class Composition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=QuantiteNutriment::class)
     */
    private $quantiteNutriments;

    /**
     * @ORM\OneToOne(targetEntity=Aliment::class, mappedBy="composition", cascade={"persist", "remove"})
     */
    private $yes;

    public function __construct()
    {
        $this->quantiteNutriments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, QuantiteNutriment>
     */
    public function getQuantiteNutriments(): Collection
    {
        return $this->quantiteNutriments;
    }

    public function addQuantiteNutriment(QuantiteNutriment $quantiteNutriment): self
    {
        if (!$this->quantiteNutriments->contains($quantiteNutriment)) {
            $this->quantiteNutriments[] = $quantiteNutriment;
        }

        return $this;
    }

    public function removeQuantiteNutriment(QuantiteNutriment $quantiteNutriment): self
    {
        $this->quantiteNutriments->removeElement($quantiteNutriment);

        return $this;
    }

    public function getYes(): ?Aliment
    {
        return $this->yes;
    }

    public function setYes(Aliment $yes): self
    {
        // set the owning side of the relation if necessary
        if ($yes->getComposition() !== $this) {
            $yes->setComposition($this);
        }

        $this->yes = $yes;

        return $this;
    }
}
