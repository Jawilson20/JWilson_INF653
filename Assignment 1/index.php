<?php
require('database.php');


$query = 'SELECT 
    c.customer_id, 
    c.email, 
    c.first_name, 
    c.last_name, 
    a.line1, 
    a.city, 
    a.state, 
    a.zip_code, 
    a.phone
FROM customers c
INNER JOIN addresses a ON c.customer_id = a.customer_id
GROUP BY 
    c.customer_id, 
    c.email, 
    c.first_name, 
    c.last_name, 
    a.line1, 
    a.city, 
    a.state, 
    a.zip_code, 
    a.phone
LIMIT 25;
;';// PUT YOUR SQL QUERY HERE
// Example: $query = 'SELECT * FROM customers';



$statement = $db->prepare($query);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guitar Shop Customers</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Customer List</h1></header>
    <main>
        <section>
            <?php foreach ($customers as $customer) : ?>
                <p><span class="bold">CustID:</span> <?php echo $customer['customerID']; ?></p>
                <p><span class="bold">Email:</span> <?php echo $customer['emailAddress']; ?></p>
                <p><span class="bold">FirstName:</span> <?php echo $customer['firstName']; ?></p>
                <p><span class="bold">LastName:</span> <?php echo $customer['lastName']; ?></p>
                <p><span class="bold">Address:</span> <?php echo $customer['line1']; ?></p>
                <p><span class="bold">City:</span> <?php echo $customer['city']; ?></p>
                <p><span class="bold">State:</span> <?php echo $customer['state']; ?></p>
                <p><span class="bold">ZipCode:</span> <?php echo $customer['zipCode']; ?></p>
                <p><span class="bold">Phone:</span> <?php echo $customer['phone']; ?></p>
                <br>
            <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>