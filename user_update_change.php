<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "flood_db"); 

if (!$conn) {
    die("Connection failed");
}

$data = json_decode(file_get_contents("php://input"), true);

$r_id = $data['req_id'];
$name = $data['contact_name'];
$num  = $data['contact_number'];
$addr = $data['address'];
$fam  = $data['family_members'];
$dist = $data['district'];
$ds   = $data['d_secretariat'];
$gn   = $data['gn_division'];
$rel  = $data['relief_type'];
$sev  = $data['flood_severity'];

$sql = "UPDATE requests SET 
        contact_name = '$name',
        contact_number = '$num',
        address = '$addr',
        family_members = '$fam',
        district = '$dist',
        d_secretariat = '$ds',
        gn_division = '$gn',
        relief_type = '$rel',
        flood_severity = '$sev'
        WHERE request_id = '$r_id'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully!"; 
} else {
    echo "Error updating record: " . mysqli_error($conn); 
}

mysqli_close($conn);
?>