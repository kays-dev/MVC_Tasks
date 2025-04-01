<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task dashboard</title>
</head>
<body>
    <h1>Task management</h1>

    <?php
    foreach($tasks as $task){
        echo '<h2>' . $task->getTitle() . '<h2>';
    }
    ?>
    
</body>
</html>