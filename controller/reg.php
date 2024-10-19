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
    try{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = $_conn->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
        $sql->bind_param("sss", $username, $email, $hashed_password);
        
        // Execute the statement
        if ($sql->execute()) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $sql->error;
        }

        // Close the statement and connection
        $sql->close();
        $_conn->close();
    } catch (mysqli_sql_exception $e) {
        echo "SQL Error: " . $e->getMessage();
    }
    return json_encode([
        "username"=>$username,
        "email"=>$email,
    ]);
}