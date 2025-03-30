<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Makes</title>
</head>
<body>
    <h1>Manage Makes</h1>
    <ul>
        <?php foreach ($makes as $make) : ?>
            <li>
                <?= htmlspecialchars($make['make_name']); ?>
                <a href="makes.php?action=delete_make&make_id=<?= $make['make_id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Add New Make</h2>
    <form action="makes.php?action=add_make" method="POST">
        <input type="text" name="make_name" required>
        <button type="submit">Add Make</button>
    </form>

    <br>
    <a href="../index.php">Back to Home</a>
</body>
</html>
