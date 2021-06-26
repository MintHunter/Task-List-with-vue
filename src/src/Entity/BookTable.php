<?php

namespace App\Entity;

use App\Repository\BookTableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookTableRepository::class)
 */
class BookTable
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     */
    private $copies_cnt;

    /**
     * @ORM\ManyToMany(targetEntity=AuthorsTable::class, mappedBy="books_id")
     */
    private $authors_id;

    /**
     * @ORM\OneToOne(targetEntity=Publisher::class, inversedBy="book_id", cascade={"persist", "remove"})
     */
    private $publisher_id;

    public function __construct()
    {
        $this->authors_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getCopiesCnt(): ?int
    {
        return $this->copies_cnt;
    }

    public function setCopiesCnt(int $copies_cnt): self
    {
        $this->copies_cnt = $copies_cnt;

        return $this;
    }

    /**
     * @return Collection|AuthorsTable[]
     */
    public function getAuthorsId(): Collection
    {
        return $this->authors_id;
    }

    public function addAuthorsId(AuthorsTable $authorsId): self
    {
        if (!$this->authors_id->contains($authorsId)) {
            $this->authors_id[] = $authorsId;
            $authorsId->addBooksId($this);
        }

        return $this;
    }

    public function removeAuthorsId(AuthorsTable $authorsId): self
    {
        if ($this->authors_id->removeElement($authorsId)) {
            $authorsId->removeBooksId($this);
        }

        return $this;
    }

    public function getPublisherId(): ?Publisher
    {
        return $this->publisher_id;
    }

    public function setPublisherId(?Publisher $publisher_id): self
    {
        $this->publisher_id = $publisher_id;

        return $this;
    }
}
