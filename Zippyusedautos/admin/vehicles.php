<?php
require_once('../config.php');
require_once('../models/vehicles_db.php');
require_once('../models/makes_db.php');
require_once('../models/types_db.php');
require_once('../models/classes_db.php');

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? 'list_vehicles';

if ($action == 'list_vehicles') {
    $vehicles = get_vehicles();
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('../views/vehicles_list.php');
} elseif ($action == 'add_vehicle') {
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

    if ($year && $model && $price && $make_id && $type_id && $class_id) {
        add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
    }
    header("Location: vehicles.php");
    exit();
} elseif ($action == 'delete_vehicle') {
    $vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
    if ($vehicle_id) {
        delete_vehicle($vehicle_id);
    }
    header("Location: vehicles.php");
    exit();
}
?>
