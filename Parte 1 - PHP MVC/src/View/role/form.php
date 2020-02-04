<?php include __DIR__ . '/../start-html.php'; ?>

    <form action="/save-role<?= isset($role) ? '?id=' . $role->getId() : ''; ?>" method="post">
        <div class="form-group">
            <label for="name">Role</label>
            <input type="text"
                   id="name"
                   name="name"
                   class="form-control"
                   value="<?= isset($role) ? $role->getRole() : ''; ?>">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>

<?php include __DIR__ . '/../end-html.php'; ?>