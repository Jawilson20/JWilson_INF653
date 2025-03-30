<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zippy Used Autos - Vehicle List</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Zippy Used Autos</h1>

    <!-- Sorting form -->
    <form method="GET" action="">
        <label>Sort by:</label>
        <select name="sort" onchange="this.form.submit()">
            <option value="price" <?= $sort_by == 'price' ? 'selected' : '' ?>>Price (High to Low)</option>
            <option value="year" <?= $sort_by == 'year' ? 'selected' : '' ?>>Year (Newest First)</option>
        </select>
    </form>

    <!-- Filter by Make -->
    <form method="GET" action="">
        <label>Filter by Make:</label>
        <select name="make_id" onchange="this.form.submit()">
            <option value="">All Makes</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['make_id'] ?>" <?= ($make_id == $make['make_id']) ? 'selected' : '' ?>>
                    <?= $make['make_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Filter by Type -->
    <form method="GET" action="">
        <label>Filter by Type:</label>
        <select name="type_id" onchange="this.form.submit()">
            <option value="">All Types</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['type_id'] ?>" <?= ($type_id == $type['type_id']) ? 'selected' : '' ?>>
                    <?= $type['type_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Filter by Class -->
    <form method="GET" action="">
        <label>Filter by Class:</label>
        <select name="class_id" onchange="this.form.submit()">
            <option value="">All Classes</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['class_id'] ?>" <?= ($class_id == $class['class_id']) ? 'selected' : '' ?>>
                    <?= $class['class_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Add Vehicle Form -->
    <h2>Add Vehicle</h2>
    <form method="POST" action="">
        <label for="year">Year:</label>
        <input type="number" name="year" required><br>

        <label for="model">Model:</label>
        <input type="text" name="model" required><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required><br>

        <label for="make_id">Make:</label>
        <select name="make_id" required>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['make_id'] ?>"><?= $make['make_name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="type_id">Type:</label>
        <select name="type_id" required>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['type_id'] ?>"><?= $type['type_name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="class_id">Class:</label>
        <select name="class_id" required>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['class_id'] ?>"><?= $class['class_name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit" name="add_vehicle">Add Vehicle</button>
    </form>

    <br>

    <!-- Display Vehicle List -->
    <h2>Vehicle List</h2>
    <table border="1">
        <tr>
            <th>Year</th><th>Model</th><th>Price</th><th>Make</th><th>Type</th><th>Class</th><th>Actions</th>
        </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?= $vehicle['year']; ?></td>
                <td><?= htmlspecialchars($vehicle['model']); ?></td>
                <td>$<?= number_format($vehicle['price'], 2); ?></td>
                <td><?= $vehicle['make_name']; ?></td>
                <td><?= $vehicle['type_name']; ?></td>
                <td><?= $vehicle['class_name']; ?></td>
                <td>
                    <a href="?delete_vehicle_id=<?= $vehicle['vehicle_id'] ?>" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="../index.php">Back to Zippy Used Autos</a>
</body>
</html>
