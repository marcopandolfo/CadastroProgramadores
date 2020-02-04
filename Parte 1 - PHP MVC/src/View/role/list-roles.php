<?php include __DIR__ . '/../start-html.php'; ?>

<a href="/new-role" class="btn btn-primary mb-2">
    New Role
</a>

<div class="row">
    <div class="col-md-12">
        <?php if (count($roles) > 0):?>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?php echo $role->getId() ?></td>
                        <td><?php echo $role->getRole() ?></td>
                        <td><a href="/update-role?id=<?php echo $role->getId()?>" class="btn btn-info">Edit</a></td>
                        <td><a href="/delete-role?id=<?php echo $role->getId()?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Have no roles on DB</p>
        <?php endif?>
    </div>
</div>
<?php include __DIR__ . '/../end-html.php'; ?>
