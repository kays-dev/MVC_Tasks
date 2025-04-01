<?php

require_once __DIR__ . '/controllers/TaskController.php';

$taskControl = new TaskController() ;

$action = $_GET['action'] ?? 'index';
$id= $_GET['id'] ?? null;

switch ($action){
    case 'view':
        $taskControl->show($id);
        break;
    case 'create':
        $taskControl->create();
        break;
    case 'index':
        $taskControl->home();
        break;
    case 'store':
        $taskControl->store();
        break;
    case 'edit':
        $taskControl->edit($id);
        break;
    case 'update':
        $taskControl->update();
        break;
    case 'delete':
        $taskControl->delete($id);
        break;
    default:
        $taskControl->forbidden();
        break;
}

// Autre méthode que le switch ↴

// if (isset($_GET['action']) && $_GET['action'] == 'view' && isset($_GET['id'])) {
    
//     $taskControl->show($_GET['id']);

// } else if (isset($_GET['action']) && $_GET['action'] == 'create'){
    
//     $taskControl->create();

// } else {
    
//     $taskControl->home();    
    
// }

