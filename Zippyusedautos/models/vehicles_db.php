<?php
// Function to get vehicles, optionally sorted by price or year, and filtered by make, type, or class
function get_vehicles($sort_by = 'price', $make_id = null, $type_id = null, $class_id = null, $filter_combined = null) {
    global $db;
    
    // If combined filter is set, split it into make_id, type_id, and class_id
    if ($filter_combined) {
        list($make_id, $type_id, $class_id) = explode('_', $filter_combined);
    }

    // Base query to select vehicles with their associated make, type, and class
    $query = "SELECT v.*, m.make_name, t.type_name, c.class_name
              FROM vehicles v
              JOIN makes m ON v.make_id = m.make_id
              JOIN types t ON v.type_id = t.type_id
              JOIN classes c ON v.class_id = c.class_id";

    // Add filtering conditions
    $conditions = [];
    if ($make_id) {
        $conditions[] = "v.make_id = :make_id";
    }
    if ($type_id) {
        $conditions[] = "v.type_id = :type_id";
    }
    if ($class_id) {
        $conditions[] = "v.class_id = :class_id";
    }
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    // Sorting by price or year
    if ($sort_by == 'year_desc') {
        $query .= " ORDER BY v.year DESC";
    } else {
        $query .= " ORDER BY v.price DESC";
    }

    // Prepare and execute the query
    $statement = $db->prepare($query);

    // Bind values for filtering
    if ($make_id) {
        $statement->bindValue(':make_id', $make_id);
    }
    if ($type_id) {
        $statement->bindValue(':type_id', $type_id);
    }
    if ($class_id) {
        $statement->bindValue(':class_id', $class_id);
    }

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();

    return $vehicles;
}

// Function to add a new vehicle to the database
function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
    global $db;
    $query = "INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
              VALUES (:year, :model, :price, :make_id, :type_id, :class_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

// Function to delete a vehicle from the database
function delete_vehicle($vehicle_id) {
    global $db;
    $query = "DELETE FROM vehicles WHERE vehicle_id = :vehicle_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
