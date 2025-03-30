<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zippy Used Autos - Admin Panel</title>
</head>
<body>
    <h1>Zippy Used Autos - Admin Panel</h1>
    <h2>Manage Vehicles</h2>

    <table border="1">
        <tr>
            <th>Year</th><th>Model</th><th>Price</th><th>Make</th><th>Type</th><th>Class</th><th>Action</th>
        </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?= $vehicle['year'] ?></td>
                <td><?= htmlspecialchars($vehicle['model']) ?></td>
                <td>$<?= number_format($vehicle['price'], 2) ?></td>
                <td><?= $vehicle['make_name'] ?></td>
                <td><?= $vehicle['type_name'] ?></td>
                <td><?= $vehicle['class_name'] ?></td>
                <td><a href="delete_vehicle.php?vehicle_id=<?= $vehicle['vehicle_id'] ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="add_vehicle.php">Add New Vehicle</a>
</body>
</html>
