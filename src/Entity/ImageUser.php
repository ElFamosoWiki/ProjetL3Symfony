<?php

namespace App\Entity;

use App\Repository\ImageUserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ImageUserRepository::class)]
class ImageUser 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $UrlImage = "utilisateur.png";

    #[ORM\OneToOne(inversedBy: 'UrlImage', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlImage(): ?string
    {
        
        return $this->UrlImage;
    }

    public function setUrlImage(string $UrlImage): self
    {
        $this->UrlImage = $UrlImage;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function __toString(){
        return $this->UrlImage;
    }
}
