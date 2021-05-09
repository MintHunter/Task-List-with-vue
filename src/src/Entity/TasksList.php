<?php

namespace App\Entity;

use App\Repository\TasksListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TasksListRepository::class)
 */
class TasksList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity ="Task", mappedBy="list_id")
	 *
     */
    private $task_id;

	/**
	 * @ORM\ManyToOne(targetEntity ="User", inversedBy="user_list_id")
	 *
	 */
    private $user_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    public function __construct()
    {
        $this->task_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskId(): ?int
    {
        return $this->task_id;
    }

    public function setTaskId(?int $task_id): self
    {
        $this->task_id = $task_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

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

    public function addTaskId(Task $taskId): self
    {
        if (!$this->task_id->contains($taskId)) {
            $this->task_id[] = $taskId;
            $taskId->setListId($this);
        }

        return $this;
    }

    public function removeTaskId(Task $taskId): self
    {
        if ($this->task_id->removeElement($taskId)) {
            // set the owning side to null (unless already changed)
            if ($taskId->getListId() === $this) {
                $taskId->setListId(null);
            }
        }

        return $this;
    }
}
