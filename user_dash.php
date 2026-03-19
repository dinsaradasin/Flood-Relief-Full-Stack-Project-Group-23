<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "flood_db");

if (!$conn) {
    echo "Could not Connect!";
}

$method = $_SERVER["REQUEST_METHOD"]; 

if ($method == "GET") {
    $user_id = $_SESSION["user_id"];

    $result = mysqli_query($conn, 
        "SELECT request_id, relief_type, district, flood_severity 
        FROM requests 
        WHERE user_id = '$user_id'"
    );

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["request_id"] . "</td>";
                echo "<td>" . $row["relief_type"] . "</td>";
                echo "<td>" . $row["district"] . "</td>";
                echo "<td>" . $row["flood_severity"] . "</td>";
                echo "</tr>";
            }

        } 
        else {
           
            echo "<tr><td></td></tr>"; 
        }
    } 
}

mysqli_close($conn);
?>