<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zippy Used Autos - Manage Types</title>
</head>
<body>
    <h1>Zippy Used Autos - Vehicle Types</h1>

    <!-- Form to add a new type -->
    <h2>Add New Type</h2>
    <form action="types.php?action=add" method="POST">
        <input type="text" name="type_name" placeholder="Type Name" required>
        <button type="submit">Add Type</button>
    </form>

    <h2>Vehicle Types</h2>
    <table border="1">
        <tr>
            <th>Type Name</th><th>Action</th>
        </tr>
        <?php foreach ($types as $type) : ?>
            <tr>
                <td><?= htmlspecialchars($type['type_name']); ?></td>
                <td><a href="types.php?action=delete&type_id=<?= $type['type_id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="../index.php">Back to Zippy Used Autos</a>
</body>
</html>
