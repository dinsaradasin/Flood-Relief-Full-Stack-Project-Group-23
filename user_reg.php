<?php

$conn = mysqli_connect("localhost", "root", "", "flood_db");

if (!$conn) {
    echo "Could not Connect!";
}

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);
    

    $name = $data["name"];
    $nic = $data["nic"];
    $username = $data["username"];
    $password = $data["password"];


    $sql = "INSERT INTO users (name, nic, username, password) VALUES ('$name', '$nic', '$username', '$password')";
    
   
    if (mysqli_query($conn,
    "INSERT INTO users (name, nic, username, password) 
    VALUES ('$name', '$nic', '$username', '$password')"
    )) 
    {
        echo "Registration Successful";
    } 
    else {
        echo "Registration Unsucessful";
    }
}
?>