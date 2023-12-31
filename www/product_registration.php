<?php
ini_set('display_errors', "On");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $db_host = 'db';
    $db_user = 'user';
    $db_pass = 'test';
    $db_name = 'shoppingCart';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Retrieve form data
    $id = crc32(uniqid());
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];

    // Insert the product into the database
    $sql = "INSERT INTO Product (id, name, price, details) VALUES ('$id', '$name', '$price', '$details')";
    if ($conn->query($sql) === TRUE) {
        echo 'Product added successfully.';
    } else {
        echo 'Error adding product: ' . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Registration</title>
</head>
<body>
    <h1>Product Registration</h1>
    <form method="POST" action="">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required><br>
        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" required><br>
        <label for="details">Details:</label>
        <textarea name="details" required></textarea><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

