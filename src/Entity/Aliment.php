<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AlimentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AlimentRepository::class)
 */
class Aliment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Composition::class, inversedBy="yes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $composition;

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

    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    public function setComposition(Composition $composition): self
    {
        $this->composition = $composition;

        return $this;
    }
}
