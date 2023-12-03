<?php session_start();?>
<html><head><link rel="stylesheet" href="./searchlist.css">
<body>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<?php
$client=$_POST['suburb'];
$_SESSION["client"]=$client;
echo "<h2>CLIENT: ".$client."</h2>";
// Connect to your database
$conn = mysqli_connect("localhost", "root", "", "myproject");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Execute a SQL query to get the client data
$sql = "SELECT id,client,name FROM clientlist WHERE client='".$client."'";
$result = mysqli_query($conn, $sql);
// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
  // Loop through the rows and display them in a table
  echo "<form action='allocation.php' method='post'><table id='myTable'>";
  echo "<tr><th>CLIENT LIST</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td><button type='submit' name='suburb' class='button' value='" . $row["name"] . "'><span>" . $row["name"] . " </span></td>";
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