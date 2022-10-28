<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomLieu = null;

    #[ORM\Column(length: 50)]
    private ?string $adresseLieu = null;

    #[ORM\OneToMany(mappedBy: 'Lieu', targetEntity: Event::class)]
    private Collection $events;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Event::class)]
    private Collection $event;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }
    
    public function __construct2()
    {
        $this->event = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLieu(): ?string
    {
        return $this->nomLieu;
    }

    public function setNomLieu(string $nomLieu): self
    {
        $this->nomLieu = $nomLieu;

        return $this;
    }

    public function getAdresseLieu(): ?string
    {
        return $this->adresseLieu;
    }

    public function setAdresseLieu(string $adresseLieu): self
    {
        $this->adresseLieu = $adresseLieu;

        return $this;
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
            $event->setLieu($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getLieu() === $this) {
                $event->setLieu(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->nomLieu;
    }
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvents(Event $events): self
    {
        if (!$this->event->contains($events)) {
            $this->event->add($events);
            $events->setLieu($this);
        }

        return $this;
    }

    public function removeEvents(Event $events): self
    {
        if ($this->event->removeElement($events)) {
            // set the owning side to null (unless already changed)
            if ($events->getLieu() === $this) {
                $events->setLieu(null);
            }
        }

        return $this;
    }
}
