<?php

function connexionDB()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "ecom1_project";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

    if (!$conn) {
        die("Error connection => " . mysqli_connect_error());
    }

    return $conn;
}

$conn = connexionDB();

?>