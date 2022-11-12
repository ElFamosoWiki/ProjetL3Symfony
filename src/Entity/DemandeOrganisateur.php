<?php

namespace App\Entity;

use App\Repository\DemandeOrganisateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeOrganisateurRepository::class)]
class DemandeOrganisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'demandeOrganisateur', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userId = null;

    #[ORM\Column(length: 255)]
    private ?string $cni = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $motifDemande = null;

    #[ORM\Column(length: 200, nullable :true)]
    private ?string $Reponse = null;

    #[ORM\Column]
    private ?bool $Accept = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(string $cni): self
    {
        $this->cni = $cni;

        return $this;
    }

    public function getMotifDemande(): ?string
    {
        return $this->motifDemande;
    }

    public function setMotifDemande(string $motifDemande): self
    {
        $this->motifDemande = $motifDemande;

        return $this;
    }

    public function __ToString(){
        return $this->motifDemande;
    }

    public function getReponse(): ?string
    {
        return $this->Reponse;
    }

    public function setReponse(string $Reponse): self
    {
        $this->Reponse = $Reponse;

        return $this;
    }

    public function isAccept(): ?bool
    {
        return $this->Accept;
    }

    public function setAccept(bool $Accept): self
    {
        $this->Accept = $Accept;

        return $this;
    }

    
}
