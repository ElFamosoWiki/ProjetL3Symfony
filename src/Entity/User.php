<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\ManyToMany(targetEntity: Event::class, inversedBy: 'users')]
    private Collection $Inscrit;

    #[ORM\OneToOne(mappedBy: 'userId', cascade: ['persist', 'remove'])]
    private ?DemandeOrganisateur $demandeOrganisateur = null;
    
    #[ORM\Column(length: 50)]
    private ?string $prenom=null;

    #[ORM\Column(length: 50)]
    private ?string $nom=null;

    #[ORM\Column(length: 50)]
    private ?string $pseudo=null;

    #[ORM\Column(type: 'boolean')]
    private $active;



    #[ORM\OneToOne(mappedBy:'user', cascade: ['persist', 'remove'])]
    private ?ImageUser $UrlImage = null;
    

    #[ORM\OneToMany(mappedBy: 'adminEvent', targetEntity: Event::class, orphanRemoval: true)]
    private Collection $events;



    public function __construct()
    {
        $this->Inscrit = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Event>
     */

    public function getInscrit(): Collection
    {
        return $this->Inscrit;
    }

    public function addInscrit(Event $inscrit): self
    {
        if (!$this->Inscrit->contains($inscrit)) {
            $this->Inscrit->add($inscrit);
        }

        return $this;
    }

    public function removeInscrit(Event $inscrit): self
    {
        $this->Inscrit->removeElement($inscrit);

        return $this;
    }

    public function getDemandeOrganisateur(): ?DemandeOrganisateur
    {
        return $this->demandeOrganisateur;
    }

    public function setDemandeOrganisateur(DemandeOrganisateur $demandeOrganisateur): self
    {
        // set the owning side of the relation if necessary
        if ($demandeOrganisateur->getUserId() !== $this) {
            $demandeOrganisateur->setUserId($this);
        }

        $this->demandeOrganisateur = $demandeOrganisateur;

        return $this;
    }
 

    
    public function __toString(){
        return $this->email;
    }  
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getUrlImage(): ?ImageUser
    {
        return $this->UrlImage;
    }

    public function setUrlImage(?ImageUser $category) : self
    {
        $this->UrlImage = $category;
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
            $event->setAdminEvent($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getAdminEvent() === $this) {
                $event->setAdminEvent(null);
            }
        }

        return $this;

    }
}
