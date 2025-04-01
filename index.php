<?php

require_once __DIR__ . '/models/Task.php';

$taskRepository = new TaskRepository();

var_dump($taskRepository->getTasks());
echo $taskRepository->getTask(2)->getTitle();


