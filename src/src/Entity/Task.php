<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\ManyToOne(targetEntity ="TasksList", inversedBy="task_id")
	 *
	 */
    private $list_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $start_time;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $end_time;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $spend_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListId(): ?int
    {
        return $this->list_id;
    }

    public function setListId(int $list_id): self
    {
        $this->list_id = $list_id;

        return $this;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(?\DateTimeInterface $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(?\DateTimeInterface $end_time): self
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function getSpendTime(): ?string
    {
        return $this->spend_time;
    }

    public function setSpendTime(?string $spend_time): self
    {
        $this->spend_time = $spend_time;

        return $this;
    }
}
