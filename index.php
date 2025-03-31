<?php

require_once __DIR__ . '/lib/database.php';
require_once __DIR__ . '/models/Task.php';

$taskRepository = new TaskRepository();

$taskRepository->getTasks();

?>