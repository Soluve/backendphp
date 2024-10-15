<?php include("config/connect.php"); ?>
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header("Content-type: application/json");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    // echo json_encode($_SERVER);
    $data = file_get_contents("php://input");
    $feed = json_decode($data);
    $username = $feed->username ?? '';
    $email = $feed->email ?? '';
    $password = $feed->password ?? '';
    $confirm_pwd = $feed->confirm_pwd ?? '';

     
    if (empty(trim($username))) {
        die ("Username is required.");
    }
    if (empty(trim($email))) {
        die ("Email is required.");
    }
    if (empty(trim($password))) {
        die ("Password is required.");
    }
    if (empty(trim($confirm_pwd))) {
        die ("You need to confirm password.");
    }
    
     
    require "controller/reg.php";

    $feedback = registerUser($username, $email, $password, $confirm_pwd);
    $profile = ($feedback);
    echo ($profile);
    
    // $user = $profile->username;
    // echo($user);
}
