<?php
require_once('../models/classes_db.php');

// Handle form submissions and actions
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

// Handle deleting a class
if ($action == 'delete') {
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    if ($class_id) {
        delete_class($class_id); // Function to delete class from the database
    }
}

// Fetch classes from the database
$classes = get_classes(); // Function to get all classes

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
    if ($type_name) {
        add_type($type_name); // Call the function to add the type
    }
}
header('Location: types.php');
exit();

include('../views/classes_list.php');
?>
