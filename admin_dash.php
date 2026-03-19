<?php
$conn = mysqli_connect("localhost", "root", "", "flood_db");

if (!$conn) {
    echo "Could not Connect!";
}

$method = $_SERVER["REQUEST_METHOD"]; 

if ($method == "GET") {
    

    $result = mysqli_query($conn, 
    "SELECT users.user_id, users.name, users.nic, users.username, 
            GROUP_CONCAT(requests.request_id SEPARATOR ', ') AS all_requests 
    FROM users 
    LEFT JOIN requests ON users.user_id = requests.user_id
    GROUP BY users.user_id"
    );

    if ($result) { 
        if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
               
                $reqs = $row["all_requests"];
              
              
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["nic"] . "</td>";
                echo "<td>" . $reqs . "</td>";
                echo "</tr>";
            }
            
        } 
        else {
            
            echo "<tr><td colspan='5'>No users found.</td></tr>"; 
        }
    } 
} 


mysqli_close($conn); 
?>