<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BienRepository::class)]
class Bien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?textarea $Contenu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Url_Photo = null;

    #[ORM\Column(length: 50)]
    private ?string $Code_postal = null;

    #[ORM\Column]
    private ?int $Numero_de_ladresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_de_la_voie = null;

    #[ORM\Column(length: 50)]
    private ?string $Prix = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date_annonce = null;

    #[ORM\Column(length: 50)]
    private ?string $Type = null;

    #[ORM\ManyToOne(inversedBy: 'id_bien')]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Form::class, inversedBy: 'id_bien')]
    private Collection $form;

    public function __construct()
    {
        $this->form = new ArrayCollection();
    }

    // public function __toString(): string
    // {
    //     return $this->city.' '.$this->year;
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): self
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getUrlPhoto(): ?string
    {
        return $this->Url_Photo;
    }

    public function setUrlPhoto(?string $Url_Photo): self
    {
        $this->Url_Photo = $Url_Photo;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->Code_postal;
    }

    public function setCodePostal(string $Code_postal): self
    {
        $this->Code_postal = $Code_postal;

        return $this;
    }

    public function getNumeroDeLadresse(): ?int
    {
        return $this->Numero_de_ladresse;
    }

    public function setNumeroDeLadresse(int $Numero_de_ladresse): self
    {
        $this->Numero_de_ladresse = $Numero_de_ladresse;

        return $this;
    }

    public function getNomDeLaVoie(): ?string
    {
        return $this->Nom_de_la_voie;
    }

    public function setNomDeLaVoie(string $Nom_de_la_voie): self
    {
        $this->Nom_de_la_voie = $Nom_de_la_voie;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->Prix;
    }

    public function setPrix(string $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getDateAnnonce(): ?\DateTimeInterface
    {
        return $this->Date_annonce;
    }

    public function setDateAnnonce(\DateTimeInterface $Date_annonce): self
    {
        $this->Date_annonce = $Date_annonce;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

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

    /**
     * @return Collection<int, Form>
     */
    public function getForm(): Collection
    {
        return $this->form;
    }

    public function addForm(Form $form): self
    {
        if (!$this->form->contains($form)) {
            $this->form->add($form);
        }

        return $this;
    }

    public function removeForm(Form $form): self
    {
        $this->form->removeElement($form);

        return $this;
    }
}
