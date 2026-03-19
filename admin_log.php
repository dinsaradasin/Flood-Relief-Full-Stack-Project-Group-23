<?php
$conn = mysqli_connect("localhost", "root", "", "flood_db");

if (!$conn) {
    echo "Could not Connect!";
}

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {
    
    $data = json_decode(file_get_contents("php://input"), true);
    
    $username = $data["username"];
    $password = $data["password"];

    $result = mysqli_query($conn, 
    "SELECT * FROM admins 
    WHERE username='$username' AND password='$password'"
    );

    if ($result) {
        if (mysqli_num_rows($result) > 0) { 
            echo "Login Successful";
        } 
        else {
            echo "Invalid Username or Password";
        }
    } 
}
   
?>