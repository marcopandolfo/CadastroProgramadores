<?php include __DIR__ . '/../start-html.php'; ?>

<a href="/new-programmer" class="btn btn-primary mb-2">
    New Programmer
</a>

<div class="row">
    <div class="col-md-12">
        <?php if (count($programmers) > 0):?>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Experience</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($programmers as $programmer): ?>
                    <tr>
                        <td><?php echo $programmer->getId() ?></td>
                        <td><?php echo $programmer->getName() ?></td>
                        <td><?php echo $programmer->getAge() ?></td>
                        <td><?php echo $programmer->getCity() ?></td>
                        <td><?php echo $programmer->getEmail() ?></td>
                        <td><?php echo $programmer->getYearsOfExperience() ?></td>
                        <td><?php echo $programmer->getRole()->getRole() ?></td>
                        <td><a href="/update-programmer?id=<?php echo $programmer->getId()?>" class="btn btn-info">Edit</a></td>
                        <td><a href="/delete-programmer?id=<?php echo $programmer->getId()?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Have no Programmers on DB</p>
        <?php endif?>
    </div>
</div>
<?php include __DIR__ . '/../end-html.php'; ?>
