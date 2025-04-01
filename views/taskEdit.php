<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">✏️ Modifier une tâche</h2>

<form action="?action=update" method="POST">
    <input type="hidden" name="id" value="<?= $task->getId() ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $task->getTitle() ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description :</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?= $task->getDescription() ?></textarea>
    </div>
    <div class="mb-3">
        <?php

        $status = $task->getStatus();

        ?>
        <label for="Statut" class="form-label">Statut :</label>
        <select class="form-control" name="status" id="status">
            <option <?= $status == 'A faire' ? 'selected' : '' ?> value="A faire">A faire</option>
            <option <?= $status == 'En cours' ? 'selected' : '' ?> value="En cours">En cours</option>
            <option <?= $status == 'Terminée' ? 'selected' : '' ?> value="Terminée">Terminée</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<a href="?" class="btn btn-secondary">Retour à la liste</a>


<?php require_once __DIR__ . '/templates/footer.php'; 