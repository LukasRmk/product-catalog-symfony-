<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\configRepository")
 */
class configuration
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


}
