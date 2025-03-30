<?php
require_once('../config.php');
require_once('../models/vehicles_db.php');

$vehicles = get_vehicles('price_desc');

include('../views/admin_vehicle_list.php');
?>
