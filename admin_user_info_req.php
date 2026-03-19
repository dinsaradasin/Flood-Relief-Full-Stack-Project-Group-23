<?php
$conn = mysqli_connect("localhost", "root", "", "flood_db");

$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data["user_id"];

$result = mysqli_query($conn, 
"SELECT * FROM requests WHERE user_id = '$user_id'"
);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["request_id"] . "</td>";
    echo "<td>" . $row["relief_type"] . "</td>";
    echo "<td>" . $row["district"] . "</td>";
    echo "<td>" . $row["d_secretariat"] . "</td>";
    echo "<td>" . $row["gn_division"] . "</td>";
    echo "<td>" . $row["contact_name"] . "</td>";
    echo "<td>" . $row["contact_number"] . "</td>";
    echo "<td>" . $row["address"] . "</td>";
    echo "<td>" . $row["family_members"] . "</td>";
    echo "<td>" . $row["flood_severity"] . "</td>";
    echo "</tr>";
}
mysqli_close($conn);
?>