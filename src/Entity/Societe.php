<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: SocieteRepository::class)]
class Societe implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $siret = null;

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
    private ?string $nom_societe = null;

    #[ORM\Column(length: 20)]
    private ?string $profession_societe = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_dirigeant = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_societe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complement_adresse_societe = null;

    #[ORM\Column(length: 5)]
    private ?string $code_postal_societe = null;

    #[ORM\Column(length: 50)]
    private ?string $ville_societe = null;

    #[ORM\Column(length: 10)]
    private ?string $telephone_societe = null;

    #[ORM\Column(length: 10)]
    private ?string $telephone_dirigeant = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $images = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation_societe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_resiliation_societe = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_validation_societe = null;

   

    #[ORM\OneToMany(targetEntity: Ajouter::class, mappedBy: 'societe')]
    private Collection $ajouters;

    #[ORM\OneToMany(targetEntity: Soigner::class, mappedBy: 'societe')]
    private Collection $soigners;

    #[ORM\OneToMany(targetEntity: Rdv::class, mappedBy: 'societe')]
    private Collection $rdvs;

    public function __construct()
    {
        $this->ajouters = new ArrayCollection();
        $this->soigners = new ArrayCollection();
        $this->rdvs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->siret;
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

    public function getNomSociete(): ?string
    {
        return $this->nom_societe;
    }

    public function setNomSociete(string $nom_societe): static
    {
        $this->nom_societe = $nom_societe;

        return $this;
    }

    public function getProfessionSociete(): ?string
    {
        return $this->profession_societe;
    }

    public function setProfessionSociete(string $profession_societe): static
    {
        $this->profession_societe = $profession_societe;

        return $this;
    }

    public function getNomDirigeant(): ?string
    {
        return $this->nom_dirigeant;
    }

    public function setNomDirigeant(string $nom_dirigeant): static
    {
        $this->nom_dirigeant = $nom_dirigeant;

        return $this;
    }

    public function getAdresseSociete(): ?string
    {
        return $this->adresse_societe;
    }

    public function setAdresseSociete(string $adresse_societe): static
    {
        $this->adresse_societe = $adresse_societe;

        return $this;
    }

    public function getComplementAdresseSociete(): ?string
    {
        return $this->complement_adresse_societe;
    }

    public function setComplementAdresseSociete(?string $complement_adresse_societe): static
    {
        $this->complement_adresse_societe = $complement_adresse_societe;

        return $this;
    }

    public function getCodePostalSociete(): ?string
    {
        return $this->code_postal_societe;
    }

    public function setCodePostalSociete(string $code_postal_societe): static
    {
        $this->code_postal_societe = $code_postal_societe;

        return $this;
    }

    public function getVilleSociete(): ?string
    {
        return $this->ville_societe;
    }

    public function setVilleSociete(string $ville_societe): static
    {
        $this->ville_societe = $ville_societe;

        return $this;
    }

    public function getTelephoneSociete(): ?string
    {
        return $this->telephone_societe;
    }

    public function setTelephoneSociete(string $telephone_societe): static
    {
        $this->telephone_societe = $telephone_societe;

        return $this;
    }

    public function getTelephoneDirigeant(): ?string
    {
        return $this->telephone_dirigeant;
    }

    public function setTelephoneDirigeant(string $telephone_dirigeant): static
    {
        $this->telephone_dirigeant = $telephone_dirigeant;

        return $this;
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

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images): static
    {
        $this->images = $images;

        return $this;
    }

    public function getDateCreationSociete(): ?\DateTimeInterface
    {
        return $this->date_creation_societe;
    }

    public function setDateCreationSociete(\DateTimeInterface $date_creation_societe): static
    {
        $this->date_creation_societe = $date_creation_societe;

        return $this;
    }

    public function getDateResiliationSociete(): ?\DateTimeInterface
    {
        return $this->date_resiliation_societe;
    }

    public function setDateResiliationSociete(?\DateTimeInterface $date_resiliation_societe): static
    {
        $this->date_resiliation_societe = $date_resiliation_societe;

        return $this;
    }

    public function getDateValidationSociete(): ?\DateTimeInterface
    {
        return $this->date_validation_societe;
    }

    public function setDateValidationSociete(?\DateTimeInterface $date_validation_societe): static
    {
        $this->date_validation_societe = $date_validation_societe;

        return $this;
    }

    

    /**
     * @return Collection<int, Ajouter>
     */
    public function getAjouters(): Collection
    {
        return $this->ajouters;
    }

    public function addAjouter(Ajouter $ajouter): static
    {
        if (!$this->ajouters->contains($ajouter)) {
            $this->ajouters->add($ajouter);
            $ajouter->setSociete($this);
        }

        return $this;
    }

    public function removeAjouter(Ajouter $ajouter): static
    {
        if ($this->ajouters->removeElement($ajouter)) {
            // set the owning side to null (unless already changed)
            if ($ajouter->getSociete() === $this) {
                $ajouter->setSociete(null);
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
            $soigner->setSociete($this);
        }

        return $this;
    }

    public function removeSoigner(Soigner $soigner): static
    {
        if ($this->soigners->removeElement($soigner)) {
            // set the owning side to null (unless already changed)
            if ($soigner->getSociete() === $this) {
                $soigner->setSociete(null);
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
            $rdv->setSociete($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): static
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getSociete() === $this) {
                $rdv->setSociete(null);
            }
        }

        return $this;
    }
}
