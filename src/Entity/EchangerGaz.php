<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EchangerGazRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EchangerGazRepository::class)
 * @ApiResource(
 *  normalizationContext={"groups"={"echangerGaz_read"}}
 * )
 */
class EchangerGaz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"echangerGaz_read","gazs_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups({"echangerGaz_read","gazs_read"})
     */
    private $Date;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"echangerGaz_read","gazs_read"})
     */
    private $quantite;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"echangerGaz_read","gazs_read"})
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Gaz::class, inversedBy="echangerGazs")
     * @Groups({"echangerGaz_read"})
     */
    private $gaz;

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
}
