<?php

$conn = mysqli_connect("localhost", "root", "", "minder");

function query($query)
{
    global $conn;
    $hasil = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }
    return $rows;
}

// function tambah($data)
// {
//     global $conn;
//     $username = $data['username'];
//     $email = $data['email'];
//     $password = md5($data['password']);
//     $cpassword = md5($data['cpassword']);


//     $query = "INSERT INTO users (username, email, password)
//                     VALUES ('$username', '$email', '$password')";
//     mysqli_query($conn, $query);
// }
