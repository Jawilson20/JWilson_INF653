<?php
require_once('../config.php');
require_once('../models/vehicles_db.php');
require_once('../models/makes_db.php');
require_once('../models/types_db.php');
require_once('../models/classes_db.php');

// Get parameters for sorting and filtering
$sort_by = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING) ?? 'price'; // Default sorting by price
$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT); // Filter by make
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT); // Filter by type
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT); // Filter by class
$filter_combined = filter_input(INPUT_GET, 'filter_combined', FILTER_SANITIZE_STRING); // Filter for combined make, type, and class

// If a combined filter is set, split it into make_id, type_id, and class_id
if ($filter_combined) {
    list($make_id, $type_id, $class_id) = explode('_', $filter_combined);
}

// Handle adding a new vehicle
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_vehicle'])) {
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

    // Add the vehicle to the database
    add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
}

// Handle deleting a vehicle
if (isset($_GET['delete_vehicle_id'])) {
    $vehicle_id = filter_input(INPUT_GET, 'delete_vehicle_id', FILTER_VALIDATE_INT);
    if ($vehicle_id) {
        delete_vehicle($vehicle_id);
    }
}

// Fetch data based on filters
$vehicles = get_vehicles($sort_by, $make_id, $type_id, $class_id);
$makes = get_makes();
$types = get_types(); // Get all vehicle types
$classes = get_classes(); // Get all vehicle classes
?>

<!-- Extra Credit: Combined Filter Form -->
<form method="GET" action="">
    <label>Combined Filter:</label>
    <select name="filter_combined" onchange="this.form.submit()">
        <option value="">Select Make, Type, Class</option>

        <?php
        // Loop through all combinations of make, type, and class
        foreach ($makes as $make) {
            foreach ($types as $type) {
                foreach ($classes as $class) {
                    $selected = ($make_id == $make['make_id'] && $type_id == $type['type_id'] && $class_id == $class['class_id']) ? 'selected' : '';
                    echo "<option value='{$make['make_id']}_{$type['type_id']}_{$class['class_id']}' $selected>
                            {$make['make_name']} - {$type['type_name']} - {$class['class_name']}
                          </option>";
                }
            }
        }
        ?>
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
