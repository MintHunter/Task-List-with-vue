<?php

namespace App\Entity;

use App\Repository\PublisherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PublisherRepository::class)
 */
class Publisher
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
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author_profit;

    /**
     * @ORM\OneToOne(targetEntity=BookTable::class, mappedBy="publisher_id", cascade={"persist", "remove"})
     */
    private $book_id;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAuthorProfit(): ?string
    {
        return $this->author_profit;
    }

    public function setAuthorProfit(string $author_profit): self
    {
        $this->author_profit = $author_profit;

        return $this;
    }

    public function getBookId(): ?BookTable
    {
        return $this->book_id;
    }

    public function setBookId(?BookTable $book_id): self
    {
        // unset the owning side of the relation if necessary
        if ($book_id === null && $this->book_id !== null) {
            $this->book_id->setPublisherId(null);
        }

        // set the owning side of the relation if necessary
        if ($book_id !== null && $book_id->getPublisherId() !== $this) {
            $book_id->setPublisherId($this);
        }

        $this->book_id = $book_id;

        return $this;
    }
}
