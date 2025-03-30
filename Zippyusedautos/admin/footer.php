<?php
$current_page = basename($_SERVER['PHP_SELF'], ".php"); // Get current script name

?>

<footer>
    <nav>
        <ul>
            <li><a href="vehicles.php" <?= ($current_page == 'vehicles') ? 'class="active"' : ''; ?>>Manage Vehicles</a></li>
            <li><a href="makes.php" <?= ($current_page == 'makes') ? 'class="active"' : ''; ?>>Manage Makes</a></li>
            <li><a href="types.php" <?= ($current_page == 'types') ? 'class="active"' : ''; ?>>Manage Types</a></li>
            <li><a href="classes.php" <?= ($current_page == 'classes') ? 'class="active"' : ''; ?>>Manage Classes</a></li>
            <li><a href="add_vehicle.php" <?= ($current_page == 'add_vehicle') ? 'class="active"' : ''; ?>>Add New Vehicle</a></li>
        </ul>
    </nav>
</footer>
