<?php
// Get the data from the form
$client = $_POST["client"];
$quot = $_POST["quot"];
$po = $_POST["po"];
$dept = $_POST["dept"];

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

// Create a connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare a SQL statement to insert the data into a table
$sql = "INSERT INTO users (client, quotation, po, department) VALUES ('$client','$quot', '$po', '$dept')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>