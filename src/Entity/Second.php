<?php

namespace App\Entity;

use App\Repository\SecondRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SecondRepository::class)
 */
class Second
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $four;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $statut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $recuit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $emplacement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaires;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFour(): ?int
    {
        return $this->four;
    }

    public function setFour(int $four): self
    {
        $this->four = $four;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getRecuit(): ?\DateTimeInterface
    {
        return $this->recuit;
    }

    public function setRecuit(\DateTimeInterface $recuit): self
    {
        $this->recuit = $recuit;

        return $this;
    }

    public function getEmplacement(): ?int
    {
        return $this->emplacement;
    }

    public function setEmplacement(?int $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }
}
