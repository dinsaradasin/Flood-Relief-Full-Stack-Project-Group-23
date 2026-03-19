<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "flood_db");

if (!$conn) {
    echo "Could not Connect!";
}


$method = $_SERVER["REQUEST_METHOD"];


if ($method == "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $user_id = $data["user_id"];
    $req_id = $data["req_id"];

    
    if (mysqli_query($conn,
    "DELETE FROM requests WHERE request_id='$req_id' AND user_id='$user_id'"
    ))
        
        if (mysqli_affected_rows($conn) > 0) {
            echo "Delete Successfully";
        } 
       
        else {
            echo "No record found";
        }

    }
    else {
        echo "Cannot run the command.";
    }

?>