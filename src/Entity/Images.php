<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 * @Vich\Uploadable()
 */
class Images
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Food::class, mappedBy="images", orphanRemoval=true)
     */
    private $relation;

    /**
     * @ORM\OneToMany(targetEntity=Chefs::class, mappedBy="images", orphanRemoval=true)
     */
    private $relationChefs;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="images", orphanRemoval=true)
     */
    private $relationAvis;

    /**
     * @ORM\OneToMany(targetEntity=Slider::class, mappedBy="images", orphanRemoval=true)
     */
    private $relationSlider;

    /**
     * @Vich\UploadableField(mapping="upload", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->relationChefs = new ArrayCollection();
        $this->relationAvis = new ArrayCollection();
        $this->relationSlider = new ArrayCollection();
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Food[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Food $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setImages($this);
        }

        return $this;
    }

    public function removeRelation(Food $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getImages() === $this) {
                $relation->setImages(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Chefs[]
     */
    public function getRelationChefs(): Collection
    {
        return $this->relationChefs;
    }

    public function addRelationChef(Chefs $relationChef): self
    {
        if (!$this->relationChefs->contains($relationChef)) {
            $this->relationChefs[] = $relationChef;
            $relationChef->setImages($this);
        }

        return $this;
    }

    public function removeRelationChef(Chefs $relationChef): self
    {
        if ($this->relationChefs->removeElement($relationChef)) {
            // set the owning side to null (unless already changed)
            if ($relationChef->getImages() === $this) {
                $relationChef->setImages(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getRelationAvis(): Collection
    {
        return $this->relationAvis;
    }

    public function addRelationAvi(Avis $relationAvi): self
    {
        if (!$this->relationAvis->contains($relationAvi)) {
            $this->relationAvis[] = $relationAvi;
            $relationAvi->setImages($this);
        }

        return $this;
    }

    public function removeRelationAvi(Avis $relationAvi): self
    {
        if ($this->relationAvis->removeElement($relationAvi)) {
            // set the owning side to null (unless already changed)
            if ($relationAvi->getImages() === $this) {
                $relationAvi->setImages(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Slider[]
     */
    public function getRelationSlider(): Collection
    {
        return $this->relationSlider;
    }

    public function addRelationSlider(Slider $relationSlider): self
    {
        if (!$this->relationSlider->contains($relationSlider)) {
            $this->relationSlider[] = $relationSlider;
            $relationSlider->setImages($this);
        }

        return $this;
    }

    public function removeRelationSlider(Slider $relationSlider): self
    {
        if ($this->relationSlider->removeElement($relationSlider)) {
            // set the owning side to null (unless already changed)
            if ($relationSlider->getImages() === $this) {
                $relationSlider->setImages(null);
            }
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
