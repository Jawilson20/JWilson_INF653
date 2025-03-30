<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zippy Used Autos - Manage Classes</title>
</head>
<body>
    <h1>Zippy Used Autos - Vehicle Classes</h1>

    <!-- Form to add a new class -->
    <h2>Add New Class</h2>
    <form action="classes.php?action=add" method="POST">
        <input type="text" name="class_name" placeholder="Class Name" required>
        <button type="submit">Add Class</button>
    </form>

    <h2>Vehicle Classes</h2>
    <table border="1">
        <tr>
            <th>Class Name</th><th>Action</th>
        </tr>
        <?php foreach ($classes as $class) : ?>
            <tr>
                <td><?= htmlspecialchars($class['class_name']); ?></td>
                <td><a href="classes.php?action=delete&class_id=<?= $class['class_id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="../index.php">Back to Zippy Used Autos</a>
</body>
</html>
