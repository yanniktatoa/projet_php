<?php

namespace App\Entity;

use App\Repository\TuteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TuteurRepository::class)]
class Tuteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Nom = null;

    #[ORM\Column(length: 200)]
    private ?string $Prenoms = null;

    #[ORM\Column(length: 200)]
    private ?string $Profession = null;

    #[ORM\Column(length: 200)]
    private ?string $NomEmployeur = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column]
    private ?int $NumeroTelephone = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\ManyToOne(inversedBy: 'tuteur')]
    private ?Etudiant $etudiant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->Prenoms;
    }

    public function setPrenoms(string $Prenoms): self
    {
        $this->Prenoms = $Prenoms;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->Profession;
    }

    public function setProfession(string $Profession): self
    {
        $this->Profession = $Profession;

        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->NomEmployeur;
    }

    public function setNomEmployeur(string $NomEmployeur): self
    {
        $this->NomEmployeur = $NomEmployeur;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->NumeroTelephone;
    }

    public function setNumeroTelephone(int $NumeroTelephone): self
    {
        $this->NumeroTelephone = $NumeroTelephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }
}
