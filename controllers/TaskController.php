<?php

require_once __DIR__ . '/../models/repositories/TaskRepo.php';
require_once __DIR__ . '/../models/Task.php';

class TaskController
{
    private TaskRepository $taskRepository;

    public function __construct()
    {

        $this->taskRepository = new TaskRepository();
    }

    public function home()
    {

        $tasks = $this->taskRepository->getTasks();

        require_once __DIR__ . '/../views/home.php';

    }

    public function show(int $id)
    {

        $task = $this->taskRepository->getTask($id);

        require_once __DIR__ . '/../views/taskView.php';

    }

    public function create()
    {

        require_once __DIR__ . '/../views/taskCreate.php';

    }

    public function store()
    {

        $task = new Task();
        $task->setTitle($_POST['title']);
        $task->setDescription($_POST['description']);
        $task->setStatus($_POST['status']);
        $this->taskRepository->create($task);

        header('Location: ?');

    }

    public function edit(int $id)
    {

        $task = $this->taskRepository->getTask($id);
        require_once __DIR__ . '/../views/taskEdit.php';
        
    }

    public function update()
    {

        $task = new Task();
        $task->setId($_POST['id']);
        $task->setTitle($_POST['title']);
        $task->setDescription($_POST['description']);
        $task->setStatus($_POST['status']);

        $this->taskRepository->update($task);

        header('Location: ?');

    }

    public function delete(int $id)
    {
        $this->taskRepository->delete($id);

        header('Location: ?');
    }

    public function forbidden()
    {

        require_once __DIR__ . '/../views/404.php';

        http_response_code(404);

    }
}
