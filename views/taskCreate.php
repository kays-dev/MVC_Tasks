<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">⊕ Créer une nouvelle tâche</h2>

<form action="?action=store" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description :</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="Statut" class="form-label">Statut :</label>
        <select class="form-control" name="status" id="status">
            <option value="a-faire">A faire</option>
            <option value="en-cours">En cours</option>
            <option value="termine">Terminée</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php require_once __DIR__ . '/templates/footer.php'; 