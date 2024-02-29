<?php

namespace App\Entity;

use App\Repository\AjouterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AjouterRepository::class)]
class Ajouter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $jours_travailler = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_entree_employer = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_sortie_employer = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_jours_vacances = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin_vacances = null;



    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $debut_repas = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fin_repas = null;

    #[ORM\ManyToOne(inversedBy: 'ajouters')]
    private ?Employer $employer = null;

    #[ORM\ManyToOne(inversedBy: 'ajouters')]
    private ?Societe $societe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoursTravailler(): ?string
    {
        return $this->jours_travailler;
    }

    public function setJoursTravailler(string $jours_travailler): static
    {
        $this->jours_travailler = $jours_travailler;

        return $this;
    }

    public function getDateEntreeEmployer(): ?\DateTimeInterface
    {
        return $this->date_entree_employer;
    }

    public function setDateEntreeEmployer(\DateTimeInterface $date_entree_employer): static
    {
        $this->date_entree_employer = $date_entree_employer;

        return $this;
    }

    public function getDateSortieEmployer(): ?\DateTimeInterface
    {
        return $this->date_sortie_employer;
    }

    public function setDateSortieEmployer(?\DateTimeInterface $date_sortie_employer): static
    {
        $this->date_sortie_employer = $date_sortie_employer;

        return $this;
    }

    public function getDateJoursVacances(): ?\DateTimeInterface
    {
        return $this->date_jours_vacances;
    }

    public function setDateJoursVacances(?\DateTimeInterface $date_jours_vacances): static
    {
        $this->date_jours_vacances = $date_jours_vacances;

        return $this;
    }

    public function getDateFinVacances(): ?\DateTimeInterface
    {
        return $this->date_fin_vacances;
    }

    public function setDateFinVacances(?\DateTimeInterface $date_fin_vacances): static
    {
        $this->date_fin_vacances = $date_fin_vacances;

        return $this;
    }



    public function getDebutRepas(): ?\DateTimeInterface
    {
        return $this->debut_repas;
    }

    public function setDebutRepas(?\DateTimeInterface $debut_repas): static
    {
        $this->debut_repas = $debut_repas;

        return $this;
    }

    public function getFinRepas(): ?\DateTimeInterface
    {
        return $this->fin_repas;
    }

    public function setFinRepas(?\DateTimeInterface $fin_repas): static
    {
        $this->fin_repas = $fin_repas;

        return $this;
    }

    public function getEmployer(): ?Employer
    {
        return $this->employer;
    }

    public function setEmployer(?Employer $employer): static
    {
        $this->employer = $employer;

        return $this;
    }

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): static
    {
        $this->societe = $societe;

        return $this;
    }
}
