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
}



?>