<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\App\Repository\PrekeRepository")
 */
class Preke 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pavadinimas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SKU;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

     /**
     * @ORM\Column(type="float")
     */
    public $base_price;

     /**
     * @ORM\Column(type="float")
     */
    public $special_price;

     /**
     * @ORM\Column(type="string", length=255)
     */
    public $image;

     /**
     * @ORM\Column(type="string", length=255)
     */
    public $description;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPavadinimas(): ?string
    {
        return $this->pavadinimas;
    }

    public function setPavadinimas(string $pavadinimas): self
    {
        $this->pavadinimas = $pavadinimas;

        return $this;
    }

    public function getSKU(): ?string
    {
        return $this->SKU;
    }

    public function setSKU(string $SKU): self
    {
        $this->SKU = $SKU;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getbase(): ?float
    {
        return $this->base_price;
    }

    public function setbase(string $base_price): self
    {
        $this->base_price = $base_price;

        return $this;
    }

    public function getspecial(): ?float
    {
        return $this->special_price;
    }

    public function setspecial(string $special_price): self
    {
        $this->special_price = $special_price;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->image;
    }

    public function setImg(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDesc(): ?string
    {
        return $this->description;
    }

    public function setDesc(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
