<html><head><link rel="stylesheet" href="./searchlist.css">
<body>
<h2>My Client List</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for client.." title="Type in a name">
<?php
// Connect to your database
$conn = mysqli_connect("localhost", "root", "", "myproject");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Execute a SQL query to get the client data
$sql = "SELECT DISTINCT client FROM clientlist ORDER BY CLIENT";
$result = mysqli_query($conn, $sql);
// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
  // Loop through the rows and display them in a table
  echo "<form action='clientcontact.php' method='post'><table id='myTable'>";
  echo "<tr><th>CLIENT LIST</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td><button type='submit' name='suburb' class='button' value='" . $row["client"] . "'><span>"  . $row["client"] . " </span></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  // No rows found
  echo "No clients found";
}
// Close the connection
mysqli_close($conn);
?>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body></html>