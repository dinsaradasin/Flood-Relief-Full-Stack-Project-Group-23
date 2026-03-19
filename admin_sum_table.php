<?php
$conn = mysqli_connect("localhost", "root", "", "flood_db");
if (!$conn) {
    echo "Could not Connect!";
}



$data = json_decode(file_get_contents("php://input"), true);

$dist = $data['district'];
$rel = $data['relief_type'];
$sev = $data['severity'];


$result = mysqli_query($conn, 
"SELECT * FROM requests WHERE district='$dist' AND relief_type='$rel' AND flood_severity='$sev'"
);


if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['request_id'] . "</td>";
        echo "<td>" . $row['relief_type'] . "</td>";
        echo "<td>" . $row['district'] . "</td>";
        echo "<td>" . $row['d_secretariat'] . "</td>";
        echo "<td>" . $row['gn_division'] . "</td>";
        echo "<td>" . $row['contact_name'] . "</td>";
        echo "<td>" . $row['contact_number'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['family_members'] . "</td>";
        echo "<td>" . $row['flood_severity'] . "</td>";
        echo "</tr>";
    }
} else 
{
  
    echo "<tr><td colspan='10' style='text-align:center;'>No records found</td></tr>";
}

mysqli_close($conn);
?>