<?php

namespace App\Entity;

use App\Repository\InformationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationsRepository::class)]
class Informations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $children = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\Column(length: 255)]
    private ?string $religion = null;

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\Column(length: 255)]
    private ?string $sign = null;

    #[ORM\Column(length: 255)]
    private ?string $liv = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $avatar = null;

    #[ORM\OneToOne(mappedBy: 'informations', targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $informations = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getChildren(): ?string
    {
        return $this->children;
    }

    public function setChildren(string $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getReligion(): ?string
    {
        return $this->religion;
    }

    public function setReligion(string $religion): self
    {
        $this->religion = $religion;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSign(): ?string
    {
        return $this->sign;
    }

    public function setSign(string $sign): self
    {
        $this->sign = $sign;

        return $this;
    }

    public function getLiv(): ?string
    {
        return $this->liv;
    }

    public function setLiv(string $liv): self
    {
        $this->liv = $liv;

        return $this;
    }

    public function getPseudo(): ?users
    {
        return $this->pseudo;
    }

    public function setPseudo(users $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getInformations(): ?self
    {
        return $this->informations;
    }

    public function setInformations(self $informations): self
    {
        // set the owning side of the relation if necessary
        if ($informations->getInformations() !== $this) {
            $informations->setInformations($this);
        }

        $this->informations = $informations;

        return $this;
    }
}
