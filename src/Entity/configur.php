<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\configRepository")
 */
class configur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $tax_rate;

    /**
     * @ORM\Column(type="boolean")
     */
    public $tax_flag;
    
    /**
     * @ORM\Column(type="integer")
     */
    public $global_discount;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTaxRate(): ?int
    {
        return $this->tax_rate;
    }

    public function setTaxRate(int $tax_rate): self
    {
        $this->tax_rate = $tax_rate;

        return $this;
    }

    public function getTaxFlag(): ?bool
    {
        return $this->tax_flag;
    }

    public function setTaxFlag(bool $tax_flag): self
    {
        $this->tax_flag = $tax_flag;

        return $this;
    }

    public function getGlobalDiscount(): ?int
    {
        return $this->global_discount;
    }

    public function setGlobalDiscount(int $global_discount): self
    {
        $this->global_discount = $global_discount;

        return $this;
    }
}
