<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_patient = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_patient = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_patient = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complement_adresse_patient = null;

    #[ORM\Column(length: 5)]
    private ?string $code_postal_patient = null;

    #[ORM\Column(length: 50)]
    private ?string $ville_patient = null;

    #[ORM\Column(length: 10)]
    private ?string $telephone_patient = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation_patient = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin_patient = null;

    

    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'patient')]
    private Collection $animals;

    #[ORM\OneToMany(targetEntity: Soigner::class, mappedBy: 'patient')]
    private Collection $soigners;

    #[ORM\OneToMany(targetEntity: Rdv::class, mappedBy: 'patient')]
    private Collection $rdvs;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->soigners = new ArrayCollection();
        $this->rdvs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

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
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNomPatient(): ?string
    {
        return $this->nom_patient;
    }

    public function setNomPatient(string $nom_patient): static
    {
        $this->nom_patient = $nom_patient;

        return $this;
    }

    public function getPrenomPatient(): ?string
    {
        return $this->prenom_patient;
    }

    public function setPrenomPatient(string $prenom_patient): static
    {
        $this->prenom_patient = $prenom_patient;

        return $this;
    }

    public function getAdressePatient(): ?string
    {
        return $this->adresse_patient;
    }

    public function setAdressePatient(string $adresse_patient): static
    {
        $this->adresse_patient = $adresse_patient;

        return $this;
    }

    public function getComplementAdressePatient(): ?string
    {
        return $this->complement_adresse_patient;
    }

    public function setComplementAdressePatient(?string $complement_adresse_patient): static
    {
        $this->complement_adresse_patient = $complement_adresse_patient;

        return $this;
    }

    public function getCodePostalPatient(): ?string
    {
        return $this->code_postal_patient;
    }

    public function setCodePostalPatient(string $code_postal_patient): static
    {
        $this->code_postal_patient = $code_postal_patient;

        return $this;
    }

    public function getVillePatient(): ?string
    {
        return $this->ville_patient;
    }

    public function setVillePatient(string $ville_patient): static
    {
        $this->ville_patient = $ville_patient;

        return $this;
    }

    public function getTelephonePatient(): ?string
    {
        return $this->telephone_patient;
    }

    public function setTelephonePatient(string $telephone_patient): static
    {
        $this->telephone_patient = $telephone_patient;

        return $this;
    }

    public function getDateCreationPatient(): ?\DateTimeInterface
    {
        return $this->date_creation_patient;
    }

    public function setDateCreationPatient(\DateTimeInterface $date_creation_patient): static
    {
        $this->date_creation_patient = $date_creation_patient;

        return $this;
    }

    public function getDateFinPatient(): ?\DateTimeInterface
    {
        return $this->date_fin_patient;
    }

    public function setDateFinPatient(?\DateTimeInterface $date_fin_patient): static
    {
        $this->date_fin_patient = $date_fin_patient;

        return $this;
    }



    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setPatient($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getPatient() === $this) {
                $animal->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Soigner>
     */
    public function getSoigners(): Collection
    {
        return $this->soigners;
    }

    public function addSoigner(Soigner $soigner): static
    {
        if (!$this->soigners->contains($soigner)) {
            $this->soigners->add($soigner);
            $soigner->setPatient($this);
        }

        return $this;
    }

    public function removeSoigner(Soigner $soigner): static
    {
        if ($this->soigners->removeElement($soigner)) {
            // set the owning side to null (unless already changed)
            if ($soigner->getPatient() === $this) {
                $soigner->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rdv>
     */
    public function getRdvs(): Collection
    {
        return $this->rdvs;
    }

    public function addRdv(Rdv $rdv): static
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs->add($rdv);
            $rdv->setPatient($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): static
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getPatient() === $this) {
                $rdv->setPatient(null);
            }
        }

        return $this;
    }
}
