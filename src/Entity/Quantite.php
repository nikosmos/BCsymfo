<?php

namespace App\Entity;

use App\Repository\QuantiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuantiteRepository::class)]
class Quantite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'quantite', targetEntity: Nft::class)]
    private Collection $nfts;

    #[ORM\Column]
    private ?int $quantiteEmise = null;

    #[ORM\Column]
    private ?int $quantiteDisponible = null;

    public function __construct()
    {
        $this->nfts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Nft>
     */
    public function getNfts(): Collection
    {
        return $this->nfts;
    }

    public function addNft(Nft $nft): static
    {
        if (!$this->nfts->contains($nft)) {
            $this->nfts->add($nft);
            $nft->setQuantite($this);
        }

        return $this;
    }

    public function removeNft(Nft $nft): static
    {
        if ($this->nfts->removeElement($nft)) {
            // set the owning side to null (unless already changed)
            if ($nft->getQuantite() === $this) {
                $nft->setQuantite(null);
            }
        }

        return $this;
    }

    public function getQuantiteEmise(): ?int
    {
        return $this->quantiteEmise;
    }

    public function setQuantiteEmise(int $quantiteEmise): static
    {
        $this->quantiteEmise = $quantiteEmise;

        return $this;
    }

    public function getQuantiteDisponible(): ?int
    {
        return $this->quantiteDisponible;
    }

    public function setQuantiteDisponible(int $quantiteDisponible): static
    {
        $this->quantiteDisponible = $quantiteDisponible;

        return $this;
    }
}
