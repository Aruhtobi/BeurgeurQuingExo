<?php

namespace App\Entity;

use App\Repository\SliderRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=SliderRepository::class)
 * @Vich\Uploadable()
 */
class Slider
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
    private $Titre;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Bouton1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Bouton2;

    /**
     * @ORM\ManyToOne(targetEntity=Images::class, inversedBy="relationSlider")
     * @ORM\JoinColumn(nullable=false)
     */
    private $images;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getBouton1(): ?string
    {
        return $this->Bouton1;
    }

    public function setBouton1(string $Bouton1): self
    {
        $this->Bouton1 = $Bouton1;

        return $this;
    }

    public function getBouton2(): ?string
    {
        return $this->Bouton2;
    }

    public function setBouton2(string $Bouton2): self
    {
        $this->Bouton2 = $Bouton2;

        return $this;
    }

    public function getImages(): ?Images
    {
        return $this->images;
    }

    public function setImages(?Images $images): self
    {
        $this->images = $images;

        return $this;
    }
}
