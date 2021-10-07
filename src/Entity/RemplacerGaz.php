<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RemplacerGazRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RemplacerGazRepository::class)
 * @ApiResource(
 *  normalizationContext={"groups"={"remplacerGaz_read"}}
 * )
 */
class RemplacerGaz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"remplacerGaz_read","gazs_read","fournisseurs_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"remplacerGaz_read","gazs_read","fournisseurs_read"})
     */
    private $Date;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"remplacerGaz_read","gazs_read","fournisseurs_read"})
     */
    private $quantite;

    /**
     * Prix unitaire
     * @ORM\Column(type="integer")
     * @Groups({"remplacerGaz_read","gazs_read","fournisseurs_read"})
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Gaz::class, inversedBy="remplacerGazs")
     * @Groups({"remplacerGaz_read","fournisseurs_read"})
     *
     */
    private $gaz;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="remplacerGazs")
     * @Groups({"remplacerGaz_read","gazs_read"})
     * 
     */
    private $fournisseur;
    
    /**
     * Prix total
     * @Groups({"remplacerGaz_read","gazs_read","fournisseurs_read"})
     */
    private $prixTotal;

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

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

    public function getGaz(): ?gaz
    {
        return $this->gaz;
    }

    public function setGaz(?gaz $gaz): self
    {
        $this->gaz = $gaz;

        return $this;
    }

    public function getFournisseur(): ?fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get prix total
     */ 
    public function getPrixTotal()
    {
        $this->prixTotal = $this->getPrix() * $this->getQuantite();
        return $this->prixTotal;
    }

}
