<?php
require_once('../models/types_db.php');

// Handle form submissions and actions
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

// Handle deleting a type
if ($action == 'delete') {
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    if ($type_id) {
        delete_type($type_id); // Function to delete type from the database
    }
}

// Fetch types from the database
$types = get_types(); // Function to get all types

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
    if ($type_name) {
        add_type($type_name); // Call the function to add the type
    }
}
header('Location: types.php');
exit();

include('../views/types_list.php');
?>
