<?php

namespace App\Entity;

use App\Repository\SousCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousCategorieRepository::class)]
class SousCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomsousCategorie = null;

    #[ORM\ManyToOne(inversedBy: 'sousCategories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $Categorie = null;

    #[ORM\OneToMany(mappedBy: 'sousCategorie', targetEntity: Jeu::class)]
    private Collection $jeus;

    #[ORM\OneToMany(mappedBy: 'souscategorie', targetEntity: Event::class)]
    private Collection $events;

    public function __construct()
    {
        $this->jeus = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomsousCategorie(): ?string
    {
        return $this->nomsousCategorie;
    }

    public function setNomsousCategorie(string $nomsousCategorie): self
    {
        $this->nomsousCategorie = $nomsousCategorie;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    /**
     * @return Collection<int, Jeu>
     */
    public function getJeus(): Collection
    {
        return $this->jeus;
    }

    public function addJeu(Jeu $jeu): self
    {
        if (!$this->jeus->contains($jeu)) {
            $this->jeus->add($jeu);
            $jeu->setSousCategorie($this);
        }

        return $this;
    }

    public function removeJeu(Jeu $jeu): self
    {
        if ($this->jeus->removeElement($jeu)) {
            // set the owning side to null (unless already changed)
            if ($jeu->getSousCategorie() === $this) {
                $jeu->setSousCategorie(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->nomsousCategorie;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setSouscategorie($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getSouscategorie() === $this) {
                $event->setSouscategorie(null);
            }
        }

        return $this;
    }

}
