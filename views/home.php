<?php require_once __DIR__ . '/templates/header.php'; ?>
        
<h2 class="mb-4">📋 Liste des tâches</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Créé le</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tasks as $task): ?>

            <tr>

                <td><?= $task->getId(); ?></td>
                <td><a href="?action=view&id=<?= $task->getId() ?>"><?= $task->getTitle(); ?></a></td>
                <td><?= $task->getDescription(); ?></td>
                <td><?= $task->getStatus(); ?></td>
                <td><?= $task->getCreatedAt() ?></td>

            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/templates/footer.php';