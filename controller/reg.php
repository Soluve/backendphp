<?php
function registerUser($username, $email, $password, $confirm_pwd){
    require"./config/connect.php";
    
    $username = $_conn->real_escape_string($username);
    $email = $_conn->real_escape_string($email);
    $password = $_conn->real_escape_string($password);
    $confirm_pwd = $_conn->real_escape_string($confirm_pwd);
     
    // if (empty($username) || empty($email) || empty($password) || empty($confirm_pwd)) {
    //     return "No empty fields allowed.";
    // }

    // if ($password !== $confirm_pwd) {
    //     return "Passwords do not match.";
    // }
    // $sql = "INSERT INTO users(username, email, password) VALUES($username , $email, $password)";
    
    // if ($_conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $_conn->error;
    //   }
      
    //   $_conn->close();
    return json_encode([
        "username"=>$username,
        "email"=>$email,
        "password"=>$password,
        "confirmpwd"=>$confirm_pwd
    ]);
}