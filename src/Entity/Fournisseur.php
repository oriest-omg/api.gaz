<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
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
}
