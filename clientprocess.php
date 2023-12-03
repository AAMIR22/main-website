<?php
// Get the data from the form
$client = $_POST["client"];
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];

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
$sql = "INSERT INTO clientlist (CLIENT,NAME,CONTACT,EMAIL) VALUES ('$client','$name', '$contact', '$email')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>