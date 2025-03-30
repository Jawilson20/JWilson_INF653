<?php
require_once('../config.php');
require_once('../models/makes_db.php');

$makes = get_makes();
include('../views/makes_list.php');
?>

<?php
require_once('../config.php');
require_once('../models/makes_db.php');

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? 'list_makes';

if ($action == 'list_makes') {
    $makes = get_makes();
    include('../views/makes_list.php');
} elseif ($action == 'add_make') {
    $make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
    if ($make_name) {
        add_make($make_name);
    }
    header("Location: makes.php");
    exit();
} elseif ($action == 'delete_make') {
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    if ($make_id) {
        delete_make($make_id);
    }
    header("Location: makes.php");
    exit();
}
?>
