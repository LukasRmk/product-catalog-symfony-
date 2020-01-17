<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlientasRepository")
 */
class Klientas
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
    private $vardas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pavarde;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono_numeris;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVardas(): ?string
    {
        return $this->vardas;
    }

    public function setVardas(string $vardas): self
    {
        $this->vardas = $vardas;

        return $this;
    }

    public function getPavarde(): ?string
    {
        return $this->pavarde;
    }

    public function setPavarde(string $pavarde): self
    {
        $this->pavarde = $pavarde;

        return $this;
    }

    public function getTelefonoNumeris(): ?string
    {
        return $this->telefono_numeris;
    }

    public function setTelefonoNumeris(string $telefono_numeris): self
    {
        $this->telefono_numeris = $telefono_numeris;

        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Naudotojas", inversedBy="klientai")
     * @ORM\JoinColumn(name="naudotojo_id", referencedColumnName="id")
     */
    private $naudotojo_id;

    public function getNaudotojoId(): ?Naudotojas
    {
        return $this->naudotojo_id;
    }

    public function setNaudotojoId(?Naudotojas $naudotojo_id): self
    {
        $this->naudotojo_id = $naudotojo_id;

        return $this;
    }

}
