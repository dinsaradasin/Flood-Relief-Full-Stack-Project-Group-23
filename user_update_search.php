<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "flood_db");

$data = json_decode(file_get_contents("php://input"), true);


$r_id = $data["req_id"];
$u_id = $_SESSION["user_id"];


$res = mysqli_query($conn, 
"SELECT * FROM requests 
WHERE request_id='$r_id' AND user_id='$u_id'"
);

if ($row = mysqli_fetch_assoc($res)) {
    echo json_encode($row);
} 
else {
    echo json_encode(["error" => "No record found!"]);
}
mysqli_close($conn);
?>