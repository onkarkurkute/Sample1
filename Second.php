<?php
$con=mysqli_connect("localhost","root","root","form");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$name = mysqli_real_escape_string($con, $_POST['name']);
$designation = mysqli_real_escape_string($con, $_POST['designation']);
$comments = mysqli_real_escape_string($con, $_POST['comments']);

$sql="INSERT INTO info (name, designation, comments)
VALUES ('$name', '$designation', '$comments')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

$result = mysqli_query($con,"SELECT * FROM info");
echo "<table border='1'>
<tr>
<th>Name</th>
<th>Designation</th>
<th>Comments</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['designation'] . "</td>";
  echo "<td>" . $row['comments'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>