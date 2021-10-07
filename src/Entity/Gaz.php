<?php

namespace App\Entity;

use App\Repository\GazRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GazRepository::class)
 */
class Gaz
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
    private $nomStationGaz;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\OneToMany(targetEntity=RemplacerGaz::class, mappedBy="gaz")
     */
    private $remplacerGazs;

    /**
     * @ORM\OneToMany(targetEntity=EchangerGaz::class, mappedBy="gaz")
     */
    private $echangerGazs;

    public function __construct()
    {
        $this->remplacerGazs = new ArrayCollection();
        $this->echangerGazs = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStationGaz(): ?string
    {
        return $this->nomStationGaz;
    }

    public function setNomStationGaz(string $nomStationGaz): self
    {
        $this->nomStationGaz = $nomStationGaz;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection|RemplacerGaz[]
     */
    public function getRemplacerGazs(): Collection
    {
        return $this->remplacerGazs;
    }

    public function addRemplacerGaz(RemplacerGaz $remplacerGaz): self
    {
        if (!$this->remplacerGazs->contains($remplacerGaz)) {
            $this->remplacerGazs[] = $remplacerGaz;
            $remplacerGaz->setGaz($this);
        }

        return $this;
    }

    public function removeRemplacerGaz(RemplacerGaz $remplacerGaz): self
    {
        if ($this->remplacerGazs->removeElement($remplacerGaz)) {
            // set the owning side to null (unless already changed)
            if ($remplacerGaz->getGaz() === $this) {
                $remplacerGaz->setGaz(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EchangerGaz[]
     */
    public function getEchangerGazs(): Collection
    {
        return $this->echangerGazs;
    }

    public function addEchangerGaz(EchangerGaz $echangerGaz): self
    {
        if (!$this->echangerGazs->contains($echangerGaz)) {
            $this->echangerGazs[] = $echangerGaz;
            $echangerGaz->setGaz($this);
        }

        return $this;
    }

    public function removeEchangerGaz(EchangerGaz $echangerGaz): self
    {
        if ($this->echangerGazs->removeElement($echangerGaz)) {
            // set the owning side to null (unless already changed)
            if ($echangerGaz->getGaz() === $this) {
                $echangerGaz->setGaz(null);
            }
        }

        return $this;
    }
}
