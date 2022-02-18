<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
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
    private $badge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\OneToMany(targetEntity=First::class, mappedBy="utilisateur")
     */
    private $firsts;

    /**
     * @ORM\OneToMany(targetEntity=Second::class, mappedBy="utilisateur")
     */
    private $seconds;

    /**
     * @ORM\OneToMany(targetEntity=Arret::class, mappedBy="utilisateur")
     */
    private $arrets;

    public function __construct()
    {
        $this->firsts = new ArrayCollection();
        $this->seconds = new ArrayCollection();
        $this->arrets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBadge(): ?int
    {
        return $this->badge;
    }

    public function setBadge(int $badge): self
    {
        $this->badge = $badge;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getUserIdentifier() {
        
        return $this->badge;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
        return $this->mdp;
    }

    public function getSalt() {}

    public function getUsername()
    {
        return $this->badge;
    }

    public function eraseCredentials() {}

    /**
     * @return Collection|First[]
     */
    public function getFirsts(): Collection
    {
        return $this->firsts;
    }

    public function addFirst(First $first): self
    {
        if (!$this->firsts->contains($first)) {
            $this->firsts[] = $first;
            $first->setUtilisateur($this);
        }

        return $this;
    }

    public function removeFirst(First $first): self
    {
        if ($this->firsts->removeElement($first)) {
            // set the owning side to null (unless already changed)
            if ($first->getUtilisateur() === $this) {
                $first->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Second[]
     */
    public function getSeconds(): Collection
    {
        return $this->seconds;
    }

    public function addSecond(Second $second): self
    {
        if (!$this->seconds->contains($second)) {
            $this->seconds[] = $second;
            $second->setUtilisateur($this);
        }

        return $this;
    }

    public function removeSecond(Second $second): self
    {
        if ($this->seconds->removeElement($second)) {
            // set the owning side to null (unless already changed)
            if ($second->getUtilisateur() === $this) {
                $second->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Arret[]
     */
    public function getArrets(): Collection
    {
        return $this->arrets;
    }

    public function addArret(Arret $arret): self
    {
        if (!$this->arrets->contains($arret)) {
            $this->arrets[] = $arret;
            $arret->setUtilisateur($this);
        }

        return $this;
    }

    public function removeArret(Arret $arret): self
    {
        if ($this->arrets->removeElement($arret)) {
            // set the owning side to null (unless already changed)
            if ($arret->getUtilisateur() === $this) {
                $arret->setUtilisateur(null);
            }
        }

        return $this;
    }
}
