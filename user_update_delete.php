<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "flood_db");

$data = json_decode(file_get_contents("php://input"), true);

$r_id = $data["req_id"];
$u_id = $_SESSION["user_id"];



if (mysqli_query($conn,
"DELETE FROM requests 
WHERE request_id='$r_id' AND user_id='$u_id'"
)) {

    echo "Deleted Successfully!";
} 
else {
    echo "Error Deleting Record.";
}
mysqli_close($conn);
?>