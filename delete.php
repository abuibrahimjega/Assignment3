<?php
// Delete a product by ID
include 'db.php';
/* @var $pdo PDO */

//TODO: Complete the code to handle product deletion request and delete the product from the database
// handle product deletion request and delete the product from the database
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Validate the ID to ensure it's a positive integer
    if(filter_var($id, FILTER_VALIDATE_INT) && $id > 0 ) {
    // Prepare and execute the SQL statement to prevent injection attacks
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
} 
}
else {
    die("Invalid product ID.");
}

header("Location: index.php");
exit();