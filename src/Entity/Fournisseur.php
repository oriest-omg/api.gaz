<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
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
    private $nomFournisseur;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $numeroFournisseur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomStation;

    /**
     * @ORM\OneToMany(targetEntity=RemplacerGaz::class, mappedBy="fournisseur")
     */
    private $remplacerGazs;

    public function __construct()
    {
        $this->remplacerGazs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFournisseur(): ?string
    {
        return $this->nomFournisseur;
    }

    public function setNomFournisseur(string $nomFournisseur): self
    {
        $this->nomFournisseur = $nomFournisseur;

        return $this;
    }

    public function getNumeroFournisseur(): ?int
    {
        return $this->numeroFournisseur;
    }

    public function setNumeroFournisseur(int $numeroFournisseur): self
    {
        $this->numeroFournisseur = $numeroFournisseur;

        return $this;
    }

    public function getNomStation(): ?string
    {
        return $this->nomStation;
    }

    public function setNomStation(string $nomStation): self
    {
        $this->nomStation = $nomStation;

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
            $remplacerGaz->setFournisseur($this);
        }

        return $this;
    }

    public function removeRemplacerGaz(RemplacerGaz $remplacerGaz): self
    {
        if ($this->remplacerGazs->removeElement($remplacerGaz)) {
            // set the owning side to null (unless already changed)
            if ($remplacerGaz->getFournisseur() === $this) {
                $remplacerGaz->setFournisseur(null);
            }
        }

        return $this;
    }

}
