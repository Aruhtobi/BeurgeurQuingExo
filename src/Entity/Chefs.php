<?php

namespace App\Entity;

use App\Repository\ChefsRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ChefsRepository::class)
 * @Vich\Uploadable()
 */
class Chefs
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Fonction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Twitter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Facebook;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Instagram;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Linkedin;

    /**
     * @ORM\ManyToOne(targetEntity=Images::class, inversedBy="relationChefs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $images;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->Fonction;
    }

    public function setFonction(string $Fonction): self
    {
        $this->Fonction = $Fonction;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->Twitter;
    }

    public function setTwitter(string $Twitter): self
    {
        $this->Twitter = $Twitter;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->Facebook;
    }

    public function setFacebook(string $Facebook): self
    {
        $this->Facebook = $Facebook;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->Instagram;
    }

    public function setInstagram(string $Instagram): self
    {
        $this->Instagram = $Instagram;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->Linkedin;
    }

    public function setLinkedin(string $Linkedin): self
    {
        $this->Linkedin = $Linkedin;

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
