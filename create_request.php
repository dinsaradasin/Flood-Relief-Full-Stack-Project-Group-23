<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "flood_db");

if (!$conn) {
    echo "Could not Connect!";
}


$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {
 
    $data = json_decode(file_get_contents("php://input"), true);
    
  
    $user_id = $_SESSION["user_id"];
    $name = $data["contact_name"];
    $number = $data["contact_number"];
    $address = $data["address"];
    $family = $data["family_members"];
    $district = $data["district"];
    $ds = $data["d_secretariat"];
    $gn = $data["gn_division"];
    $relief = $data["relief_type"];
    $severity = $data["flood_severity"];
    $desc = $data["description"];

    
    

    if (mysqli_query($conn, 
    "INSERT INTO requests (user_id, contact_name, contact_number, address, family_members, district, d_secretariat, gn_division, relief_type, flood_severity, description) 
    VALUES ('$user_id', '$name', '$number', '$address', '$family', '$district', '$ds', '$gn', '$relief', '$severity', '$desc')"
    )) 
    {
        echo "Submitted Successfully";
    }

    else {
        echo "Submission Unsuccessful";
    }
}
?>