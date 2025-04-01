<?php

require_once __DIR__ . '/../lib/database.php';

class Task
{

    // readonly remplace les getter
    private int $id;
    private string $title;
    private string $description;
    private string $status;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}

