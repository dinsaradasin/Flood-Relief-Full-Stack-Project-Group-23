<?php
$conn = mysqli_connect("localhost", "root", "", "flood_db");

$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data["user_id"];

$result = mysqli_query($conn, 
"SELECT * FROM users WHERE user_id = '$user_id'"
);

if ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["user_id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["nic"] . "</td>";
    echo "<td>" . $row["username"] . "</td>";
    echo "</tr>";
}
mysqli_close($conn);
?>