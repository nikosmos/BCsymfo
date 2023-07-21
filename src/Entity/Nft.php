<?php

namespace App\Entity;

use App\Repository\NftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NftRepository::class)]
class Nft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cheminImageNft = null;

    #[ORM\Column(length: 255)]
    private ?string $codeNft = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDrop = null;

    #[ORM\Column(length: 255)]
    private ?string $nomNft = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 6)]
    private ?string $prixAchat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 6)]
    private ?string $prixInitial = null;


    #[ORM\ManyToOne(inversedBy: 'nfts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quantite $quantite = null;


    #[ORM\ManyToOne(inversedBy: 'nfts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Eth $eth = null;

    #[ORM\ManyToOne(inversedBy: 'nfts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SousCategorie $sousCategorie = null;

    #[ORM\OneToMany(mappedBy: 'nft', targetEntity: Acquisition::class)]
    private Collection $acquisition;

    public function __construct()
    {
        $this->acquisition = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheminImageNft(): ?string
    {
        return $this->cheminImageNft;
    }

    public function setCheminImageNft(?string $cheminImageNft): static
    {
        $this->cheminImageNft = $cheminImageNft;

        return $this;
    }

    public function getCodeNft(): ?string
    {
        return $this->codeNft;
    }

    public function setCodeNft(string $codeNft): static
    {
        $this->codeNft = $codeNft;

        return $this;
    }

    public function getDateDrop(): ?\DateTimeInterface
    {
        return $this->dateDrop;
    }

    public function setDateDrop(\DateTimeInterface $dateDrop): static
    {
        $this->dateDrop = $dateDrop;

        return $this;
    }

    public function getNomNft(): ?string
    {
        return $this->nomNft;
    }

    public function setNomNft(string $nomNft): static
    {
        $this->nomNft = $nomNft;

        return $this;
    }

    public function getPrixAchat(): ?string
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(string $prixAchat): static
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getPrixInitial(): ?string
    {
        return $this->prixInitial;
    }

    public function setPrixInitial(string $prixInitial): static
    {
        $this->prixInitial = $prixInitial;

        return $this;
    }


    public function getQuantite(): ?Quantite
    {
        return $this->quantite;
    }

    public function setQuantite(?Quantite $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEth(): ?Eth
    {
        return $this->eth;
    }

    public function setEth(?Eth $eth): static
    {
        $this->eth = $eth;

        return $this;
    }

    public function getSousCategorie(): ?SousCategorie
    {
        return $this->sousCategorie;
    }

    public function setSousCategorie(?SousCategorie $sousCategorie): static
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    /**
     * @return Collection<int, Acquisition>
     */
    public function getAcquisition(): Collection
    {
        return $this->acquisition;
    }

    public function addAcquisition(Acquisition $acquisition): static
    {
        if (!$this->acquisition->contains($acquisition)) {
            $this->acquisition->add($acquisition);
            $acquisition->setNft($this);
        }

        return $this;
    }

    public function removeAcquisition(Acquisition $acquisition): static
    {
        if ($this->acquisition->removeElement($acquisition)) {
            // set the owning side to null (unless already changed)
            if ($acquisition->getNft() === $this) {
                $acquisition->setNft(null);
            }
        }

        return $this;
    }
}
