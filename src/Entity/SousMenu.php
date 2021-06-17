<?php

namespace App\Entity;

use App\Repository\SousMenuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousMenuRepository::class)
 */
class SousMenu
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
    private $nomm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="relation")
     */
    private $menu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomm(): ?string
    {
        return $this->nomm;
    }

    public function setNomm(string $nomm): self
    {
        $this->nomm = $nomm;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

        return $this;
    }
}
