<?php
require_once __DIR__ . "/../Task.php";

class TaskRepository
{
    public DatabaseConnection $connection;
    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    // Récupère toutes les tâches existantes
    public function getTasks(): array
    {

        $statement = $this->connection->getConnected()->query('SELECT * FROM tasks')->fetchAll();

        $tasks = [];
        foreach ($statement as $row) {
            $task = new Task();
            $task->setId($row['id']);
            $task->setTitle($row['title']);
            $task->setDescription($row['description']);
            $task->setStatus($row['status']);
            $task->setCreatedAt(DateTime::createFromFormat('Y-m-d H:i:s', $row['created_at']));
            $task->setUpdatedAt(DateTime::createFromFormat('Y-m-d H:i:s', $row['updated_at']));

            $tasks[] = $task;
        }
        return $tasks;
    }

    // Récupère une tâche avec l'id spécifié en paramètre
    public function getTask(int $id): ?Task
    {

        $statement = $this->connection->getConnected()->query("SELECT * FROM tasks WHERE id = $id");
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $task = new Task();
        $task->setId($result['id']);
        $task->setTitle($result['title']);
        $task->setDescription($result['description']);
        $task->setStatus($result['status']);
        $task->setCreatedAt(DateTime::createFromFormat('Y-m-d H:i:s', $result['created_at']));
        $task->setUpdatedAt(DateTime::createFromFormat('Y-m-d H:i:s', $result['updated_at']));

        return $task;
    }

    // Créer une nouvelle tâche dont l'objet est en paramètre
    public function create(Task $task): bool
    {
        $statement = $this->connection
            ->getConnected()
            ->prepare("INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status);");

        return $statement->execute([
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'status' => $task->getStatus()
        ]);
    }

    // Mets à jour une tâche existante dont l'objet est en paramètre
    public function update(Task $task): bool
    {
        $statement = $this->connection
            ->getConnected()
            ->prepare("UPDATE tasks SET title = title, description = :description, status = :status WHERE id =:id");

        return $statement->execute([
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'status' => $task->getStatus()
        ]);
    }

    // Supprime une tâche existante dont on mentionne l'id en paramètre
    public function delete(int $id): bool
    {
        $statement = $this->connection
            ->getConnected()
            ->prepare("DELETE FROM tasks WHERE id=:id");
        $statement->bindParam(":id", $id);

        return $statement->execute([
            'id' => $id
        ]);
    }
}

