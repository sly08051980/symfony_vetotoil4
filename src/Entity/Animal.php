<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_animal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance_animal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_creation_animal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin_animal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $images_animal = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Race $race = null;

    #[ORM\OneToMany(targetEntity: Soigner::class, mappedBy: 'animal')]
    private Collection $soigner;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Patient $patient = null;

    #[ORM\OneToMany(targetEntity: Rdv::class, mappedBy: 'animal')]
    private Collection $rdvs;

    public function __construct()
    {
        $this->soigner = new ArrayCollection();
        $this->rdvs = new ArrayCollection();
    }

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomAnimal(): ?string
    {
        return $this->prenom_animal;
    }

    public function setPrenomAnimal(string $prenom_animal): static
    {
        $this->prenom_animal = $prenom_animal;

        return $this;
    }

    public function getDateNaissanceAnimal(): ?\DateTimeInterface
    {
        return $this->date_naissance_animal;
    }

    public function setDateNaissanceAnimal(\DateTimeInterface $date_naissance_animal): static
    {
        $this->date_naissance_animal = $date_naissance_animal;

        return $this;
    }

    public function getDateCreationAnimal(): ?\DateTimeInterface
    {
        return $this->date_creation_animal;
    }

    public function setDateCreationAnimal(?\DateTimeInterface $date_creation_animal): static
    {
        $this->date_creation_animal = $date_creation_animal;

        return $this;
    }

    public function getDateFinAnimal(): ?\DateTimeInterface
    {
        return $this->date_fin_animal;
    }

    public function setDateFinAnimal(?\DateTimeInterface $date_fin_animal): static
    {
        $this->date_fin_animal = $date_fin_animal;

        return $this;
    }

    public function getImagesAnimal(): ?string
    {
        return $this->images_animal;
    }

    public function setImagesAnimal(?string $images_animal): static
    {
        $this->images_animal = $images_animal;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return Collection<int, Soigner>
     */
    public function getSoigner(): Collection
    {
        return $this->soigner;
    }

    public function addSoigner(Soigner $soigner): static
    {
        if (!$this->soigner->contains($soigner)) {
            $this->soigner->add($soigner);
            $soigner->setAnimal($this);
        }

        return $this;
    }

    public function removeSoigner(Soigner $soigner): static
    {
        if ($this->soigner->removeElement($soigner)) {
            // set the owning side to null (unless already changed)
            if ($soigner->getAnimal() === $this) {
                $soigner->setAnimal(null);
            }
        }

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

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
            $rdv->setAnimal($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): static
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getAnimal() === $this) {
                $rdv->setAnimal(null);
            }
        }

        return $this;
    }


}
