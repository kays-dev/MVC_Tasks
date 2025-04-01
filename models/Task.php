<?php
require_once 'C:\xampp\htdocs\mvcTasks\lib\database.php';
class Task{

    // readonly remplace les getter
    public int $id;
    public string $title;
    public string $description;
    public string $status;
    public DateTime $createdAt;
    public DateTime $updatedAt;

    // public function getId(): int{
    //     return $this->id;
    // }
    // public function getTitle(): string{
    //     return $this->title;
    // }
    // public function getDescription(): string{
    //     return $this->description;
    // }
    // public function getStatus(): string{
    //     return $this->status;
    // }
    // public function getCreatedAt(): DateTime{
    //     return $this->createdAt;
    // }
    // public function getUpdatedAt(): DateTime{
    //     return $this->updatedAt;
    // }
}

class TaskRepository{
    public DatabaseConnection $connection; 
    public function __construct(){
        $this->connection = new DatabaseConnection();
    }

    // Récupère toutes les tâches existantes
    public function getTasks(): array{

        $statement = $this->connection->getConnected()->query('SELECT * FROM tasks')->fetchAll();

        $tasks =[];
        foreach($statement as $row){
            $task= new Task();
            $task->id= $row['id'];
            $task->title= $row['title'];
            $task->description= $row['description'];
            $task->status= $row['status'];
            $task->createdAt= DateTime::createFromFormat('Y-m-d H:i:s', $row['created_at']);
            $task->updatedAt= DateTime::createFromFormat('Y-m-d H:i:s', $row['updated_at']);

            $tasks[]= $task;
        }
    return $tasks;
    }

    // Récupère une tâche avec l'id spécifié en paramètre
    public function getTask(int $id): Task{

        $statement = $this->connection->getConnected()->query("SELECT * FROM tasks WHERE id = :id");
        $result = $statement->fetch();

        if(!$result){
            return null;
        }

        $task= new Task();
        $task->id= $result['id'];
        $task->title= $result['title'];
        $task->description= $result['description'];
        $task->status= $result['status'];
        $task->createdAt= DateTime::createFromFormat('Y-m-d H:i:s', $result['created_at']);
        $task->updatedAt= DateTime::createFromFormat('Y-m-d H:i:s', $result['updated_at']);

        return $task;
    }

    // Créer une nouvelle tâche dont l'objet est en paramètre
    public function create(Task $task): bool{
        $statement = $this -> connection
                ->getConnected()
                ->prepare("INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status);");
        $statement->bindParam(":title", $task->title);
        $statement->bindParam(":description", $task->description);
        $statement->bindParam(":status", $task->status);

        return $statement->execute();
    }
    
    // Mets à jour une tâche existante dont l'objet est en paramètre
    public function update(Task $task): bool{
        $statement = $this -> connection
                ->getConnected()
                ->prepare("UPDATE tasks SET title = title, description = :description, status = :status WHERE id =:id");
        $statement->bindParam(":id", $task->id);
        $statement->bindParam(":title", $task->title);
        $statement->bindParam(":description", $task->description);
        $statement->bindParam(":status", $task->status);

        return $statement->execute();
    }
    
    // Supprime une tâche existante dont on mentionne l'id en paramètre
    public function delete(int $id): bool{
        $statement = $this -> connection
                ->getConnected()
                ->prepare("DELETE FROM tasks WHERE id=:id");
        $statement->bindParam(":id", $id);

        return $statement->execute();
    }

}

?>