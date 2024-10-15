<?php
$_host = "localhost";
$_user = "root";
$_password = "";
$_dbname = "blogphil";

$_conn = mysqli_connect($_host, $_user, $_password, $_dbname) or die("Unable to connect");

// if($_conn){
//     echo("Database connected");
//     $sql = "CREATE DATABASE `blogphil`";
//     mysqli_query($_conn, $sql);
//     echo "Database created";
// }