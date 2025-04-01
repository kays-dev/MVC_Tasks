<?php

require_once __DIR__ . '/models/Task.php';
require_once __DIR__ . '/models/repositories/TaskRepo.php';

$taskRepository = new TaskRepository();

$tasks = $taskRepository->getTasks();

require_once __DIR__ . '/views/home.php';