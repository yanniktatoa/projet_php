<?php

namespace App\Entity;

use App\Repository\DossiersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DossiersRepository::class)]
class Dossiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $DemandeManuscrite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ActeDeNaissance = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $CertificatDeNationalite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $DiplomeObtenu = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $CertificatMedical = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDemandeManuscrite(): ?string
    {
        return $this->DemandeManuscrite;
    }

    public function setDemandeManuscrite(?string $DemandeManuscrite): self
    {
        $this->DemandeManuscrite = $DemandeManuscrite;

        return $this;
    }

    public function getActeDeNaissance(): ?string
    {
        return $this->ActeDeNaissance;
    }

    public function setActeDeNaissance(?string $ActeDeNaissance): self
    {
        $this->ActeDeNaissance = $ActeDeNaissance;

        return $this;
    }

    public function getCertificatDeNationalite(): ?string
    {
        return $this->CertificatDeNationalite;
    }

    public function setCertificatDeNationalite(?string $CertificatDeNationalite): self
    {
        $this->CertificatDeNationalite = $CertificatDeNationalite;

        return $this;
    }

    public function getDiplomeObtenu(): ?string
    {
        return $this->DiplomeObtenu;
    }

    public function setDiplomeObtenu(?string $DiplomeObtenu): self
    {
        $this->DiplomeObtenu = $DiplomeObtenu;

        return $this;
    }

    public function getCertificatMedical(): ?string
    {
        return $this->CertificatMedical;
    }

    public function setCertificatMedical(?string $CertificatMedical): self
    {
        $this->CertificatMedical = $CertificatMedical;

        return $this;
    }
   
}
