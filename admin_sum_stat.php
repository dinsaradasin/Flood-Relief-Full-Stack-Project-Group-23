<?php
$conn = mysqli_connect("localhost", "root", "", "flood_db");

if (!$conn) {
    echo "Could not Connect!";
}


$query1  = "SELECT COUNT(*) AS c1 FROM requests";
$result1 = mysqli_query($conn, $query1);
$row1    = mysqli_fetch_assoc($result1);
$total   = $row1['c1'];


$query2  = "SELECT COUNT(*) AS c2 FROM requests WHERE flood_severity='High'";
$result2 = mysqli_query($conn, $query2);
$row2    = mysqli_fetch_assoc($result2);
$high    = $row2['c2'];


$query3  = "SELECT COUNT(*) AS c3 FROM requests WHERE relief_type='Food'";
$result3 = mysqli_query($conn, $query3);
$row3    = mysqli_fetch_assoc($result3);
$food    = $row3['c3'];


$query4  = "SELECT COUNT(*) AS c4 FROM requests WHERE relief_type='Medicine'";
$result4 = mysqli_query($conn, $query4);
$row4    = mysqli_fetch_assoc($result4);
$med     = $row4['c4'];


$query5  = "SELECT COUNT(*) AS c5 FROM requests WHERE relief_type='Water'";
$result5 = mysqli_query($conn, $query5);
$row5    = mysqli_fetch_assoc($result5);
$water   = $row5['c5'];

$query6  = "SELECT COUNT(*) AS c6 FROM requests WHERE relief_type='shelter'";
$result6 = mysqli_query($conn, $query6);
$row6    = mysqli_fetch_assoc($result6);
$shelter   = $row6['c6'];


echo "<p>Total Requests: <b>$total</b></p>";
echo "<p>High Severity: <b>$high</b></p>";
echo "<p>Food Requests: <b>$food</b></p>";
echo "<p>Medicine Requests: <b>$med</b></p>";
echo "<p>Water Requests: <b>$water</b></p>";
echo "<p>Shelter Requests: <b>$shelter</b></p>";

mysqli_close($conn);
?>