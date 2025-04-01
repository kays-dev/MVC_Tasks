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
    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }
    public function getUpdatedAt(): string
    {
        return $this->updatedAt->format('Y-m-d H:i:s');
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setTitle(string $title)
    {
        $this->title = htmlspecialchars($title);
    }
    public function setDescription(string $description)
    {
        $this->description = htmlspecialchars($description);
    }
    public function setStatus(string $status)
    {
        $this->status = htmlspecialchars($status);
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

