<?php

namespace App\Entity;

use App\Repository\GruppoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GruppoRepository::class)
 */
class Gruppo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity=Utenti::class, mappedBy="gruppo")
     */
    private $utenti;

    public function __construct()
    {
        $this->utenti = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return Collection|Utenti[]
     */
    public function getUtenti(): Collection
    {
        return $this->utenti;
    }

    public function addUtenti(Utenti $utenti): self
    {
        if (!$this->utenti->contains($utenti)) {
            $this->utenti[] = $utenti;
            $utenti->setGruppo($this);
        }

        return $this;
    }

    public function removeUtenti(Utenti $utenti): self
    {
        if ($this->utenti->contains($utenti)) {
            $this->utenti->removeElement($utenti);
            // set the owning side to null (unless already changed)
            if ($utenti->getGruppo() === $this) {
                $utenti->setGruppo(null);
            }
        }

        return $this;
    }
}
