<?php 

session_start();

require 'Config/db.php';
require_once 'emailsender.php';

$errors = array();
$username ="";
$emailid ="";

// When User clicks on signup button after entering all necessary values
if (isset($_POST['signup-btn']))
{
    $username = $_POST['username'];
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    //Check if fields are empty or not
    if (empty($username)){
        $errors['username'] = "username required";
    }
    
    if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
        $errors['emailid'] = "Invalid Email";
    }
    
    if (empty($emailid)){
        $errors['emailid'] = "Email required";
    }
    
    if (empty($password)){
        $errors['password'] = "password required";
    }
    
    if ($password !== $confirmpassword){
        $errors['password'] = "Passwords don't match";
    }
    
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $emailid);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();
    
    if ($userCount>0){
        $errors['emailid']="Email Exists";
    }
    //Check if there  are any errors
    if (count($errors) === 0){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;
        // Insert the entered values into the DB
        $sql = "INSERT INTO users (username, email, verified,token,password) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssbss', $username, $emailid, $verified, $token, $password);
        if($stmt->execute()){
            //user login
            $user_id=$conn->insert_id;
            $_SESSION['id']=$user_id;
            $_SESSION['username']=$username;
            $_SESSION['emailid']=$emailid;
            $_SESSION['verified']=$verified;

            sendemail($emailid, $token);

            $_SESSION['message'] = "you are logged in!";
            $_SESSION['alert-class']="alert success";
            header('location:index.php');
            exit();
        } 
        else{
            $errors['db_error']="DATABASE ERROR: Failed to Register";
        }
    }

}

//Login

if (isset($_POST['Login-btn']))
{
    $username = $_POST['username'];
    
    $password = $_POST['password'];
    
    
    //Check if fields are empty or not
    if (empty($username)){
        $errors['username'] = "username required";
    }
    
    
    if (empty($password)){
        $errors['password'] = "password required";
    }

    $sql ="SELECT * FROM users WHERE email =? OR username=? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if(password_verify($password,$user['password'])){
        //code for Successful login
        
        $_SESSION['id']=$user['id'];
        $_SESSION['username']=$user['username'];
        $_SESSION['emailid']=$user['email'];
        $_SESSION['verified']=$user['verified'];

        $_SESSION['message'] = "you are logged in!";
        $_SESSION['alert-class']="alert success";
        header('location:index.php');
        exit();
    }else{
        $errors['login fail'] = 'Wrong Credentials';
    }
}