<?php include __DIR__ . '/../start-html.php'; ?>

    <form action="/save-programmer<?= isset($programmer) ? '?id=' . $programmer->getId() : ''; ?>" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   id="name"
                   name="name"
                   class="form-control"
                   value="<?= isset($programmer) ? $programmer->getName() : ''; ?>">

            <label for="age">Age</label>
            <input type="number"
                   id="age"
                   name="age"
                   class="form-control"
                   value="<?= isset($programmer) ? $programmer->getAge() : ''; ?>">

            <label for="city">City</label>
            <input type="text"
                   id="city"
                   name="city"
                   class="form-control"
                   value="<?= isset($programmer) ? $programmer->getCity() : ''; ?>">

            <label for="city">Email</label>
            <input type="email"
                   id="email"
                   name="email"
                   class="form-control"
                   value="<?= isset($programmer) ? $programmer->getEmail() : ''; ?>">

            <label for="city">Years Of Experience</label>
            <input type="number"
                   id="exp"
                   name="exp"
                   class="form-control"
                   value="<?= isset($programmer) ? $programmer->getYearsOfExperience() : ''; ?>">

                <label for="role_id">Role</label>
                <select class="form-control" name="role_id">
                    <?php foreach ($roles as $role): ?>
                        <option value="<?php echo $role->getId()?>"><?php echo $role->getRole()?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>

<?php include __DIR__ . '/../end-html.php'; ?>