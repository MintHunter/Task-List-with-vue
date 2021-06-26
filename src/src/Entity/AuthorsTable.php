<?php

namespace App\Entity;

use App\Repository\AuthorsTableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthorsTableRepository::class)
 */
class AuthorsTable
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sec_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\ManyToMany(targetEntity=BookTable::class, inversedBy="authors_id")
     */
    private $books_id;

    public function __construct()
    {
        $this->books_id = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSecName(): ?string
    {
        return $this->sec_name;
    }

    public function setSecName(string $sec_name): self
    {
        $this->sec_name = $sec_name;

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

    /**
     * @return Collection|BookTable[]
     */
    public function getBooksId(): Collection
    {
        return $this->books_id;
    }

    public function addBooksId(BookTable $booksId): self
    {
        if (!$this->books_id->contains($booksId)) {
            $this->books_id[] = $booksId;
        }

        return $this;
    }

    public function removeBooksId(BookTable $booksId): self
    {
        $this->books_id->removeElement($booksId);

        return $this;
    }
}
