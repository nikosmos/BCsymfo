<?php

namespace App\Entity;

use App\Repository\EthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EthRepository::class)]
class Eth
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'eth', targetEntity: Nft::class)]
    private Collection $nfts;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 6)]
    private ?string $coursEth = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $jourCours = null;

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
            $nft->setEth($this);
        }

        return $this;
    }

    public function removeNft(Nft $nft): static
    {
        if ($this->nfts->removeElement($nft)) {
            // set the owning side to null (unless already changed)
            if ($nft->getEth() === $this) {
                $nft->setEth(null);
            }
        }

        return $this;
    }

    public function getCoursEth(): ?string
    {
        return $this->coursEth;
    }

    public function setCoursEth(string $coursEth): static
    {
        $this->coursEth = $coursEth;

        return $this;
    }

    public function getJourCours(): ?\DateTimeInterface
    {
        return $this->jourCours;
    }

    public function setJourCours(\DateTimeInterface $jourCours): static
    {
        $this->jourCours = $jourCours;

        return $this;
    }
}
