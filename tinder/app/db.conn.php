<?php

# server name
$host = "localhost";
# user name
$username = "root";
# password
$pass = "";

# database name
$dbname = "lasto";

#creating database connection
try {
  $conn = new PDO(
    "mysql:host=$host;dbname=$dbname",
    $username,
    $pass,
  );
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed : " . $e->getMessage();
}

// $conn = new mysqli($host, $username, $pass, $dbname);
// if (mysqli_connect_errno()) {
//   echo "Error: Could not connect to database.";
//   exit;
// }
