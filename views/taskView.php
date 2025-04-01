<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">📋 Détail de la tâche</h2>

<p><strong>Titre : </strong> <?= $task->getTitle() ?></p>
<p><strong>Description : </strong> <?= $task->getDescription() ?></p>
<p><strong>Statut : </strong> <?= $task->getStatus() ?></p>
<p><strong>Créée le : </strong> <?= $task->getCreatedAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $task->getUpdatedAt() ?></p>

<a href="?action=edit&id=<?= $task->getId() ?>" class="btn btn-warning">Modifier la tâche</a>
<a href="?" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php'; 