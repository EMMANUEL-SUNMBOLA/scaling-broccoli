<?php
session_start();
$method = $_SERVER['REQUEST_METHOD'];
$button = $_POST['sign_button'];
$button2 = $_POST['log_button'];

if( (!isset($button)) ||(!isset($button2)) || ($method !== 'POST')){
    $err['inv'] = "SOMETHING WENT'T WRONG";
    header("Location: /404.php");
}
if(isset($button) && $method == 'POST'){
    $firstname = strip_tags(trim($_POST["firstname"]));
    $lastname =  strip_tags(trim($_POST["lastname"]));
    $email =  strip_tags(trim($_POST["email"]));
    $phone =  strip_tags(trim($_POST["phone"]));
    $password = $_POST["password1"];
    $Vpass    = $_POST["password2"];
    $err = [];
 
    require_once "functions.php";
    require_once "database.php";

    if(empty($firstname)){
        $err['firstname'] = 'FIRST NAME IS REQUIRED';
    }
    elseif((strlen($firstname) < 3)){
        $err['firstname'] = 'FIRSTNAME CANNOT BE LESS THAN 3 CHARACTERS';
    }
    elseif(invalidusername($firstname) !== true){
        $err['firstname'] = 'FIRSTNAME CANNOT CONTAIN SPECIAL CHARACTERS';
    }
    elseif(checkupper($firstname) !== true){
        $err['firstname'] = 'FIRSTNAME MUST BEGIN WITH CAPITAL LETTER';
    }

    // last name validation
    if(empty($lastname)){
        $err['lastname'] = 'LAST NAME IS REQUIRED';
    }
    elseif(strlen($lastname) < 3){
        $err['lastname'] = 'LASTNAME CANNOT BE LESS THAN 3 CHARACTERS';
    }
    elseif(invalidusername($lastname) !== true){
        $err['lastname'] = 'LASTNAME CANNOT CONTAIN SPECIAL CHARACTERS';
    }
    elseif(checkupper($lastname) !== true){
        $err['lastname'] = 'LASTNAME MUST BEGIN WITH CAPITAL LETTER';
    }

    // email validation
    if(empty($email)){
        $err['email'] = 'E-MAIL IS REQUIRED';
    }
    elseif(emailmax($email) !== true){
        $err['email'] = "EMAIL CANNOT BE OVER 225 CHARACTERS";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $err['email'] = 'INVALID EMAIL';
    }

    // phone validation
    if(empty($phone)){
        $err['phone'] = 'TEL IS REQUIRED';
    }
    elseif(isset($phone)){
        if((str_starts_with($phone,"0"))&&(strlen($phone) !== 11 )){
            $err['number'] = 'INVALID PHONE NUMBER';
        }elseif((str_starts_with($phone,"+234")) && (strlen($phone) !== 15)){
            $err['number'] = 'INVALID PHONE NUMBER';
        }
    } 

    // password validation
    if(empty($password)){
        $err['password'] = 'PASSWORD IS REQUIRED';
    }
    // elseif(strlen($password) < 6){
    //     $err['password'] = 'PASSWORD HAS TO BE AT LEAST 6 CHARACTERS';
    // }
    elseif($password !== $Vpass){
        $err['password'] = 'PASSWORD MUST MATCH';
    }
    // elseif(passstrength($password) !== true){
    //     $err['password'] = 'PASSWORD IS WEAK';
    // }
    
    if(userexists($conn,$firstname,$email) !== false){
        $err['user'] = 'USER ALREADY EXISTS';
    }


    if(isset($err)&&count($err)>0){
        $_SESSION['error'] = $err;
        header('Location: /register.php');
    }
    elseif(count($err) == 0){
        $msg = 'YOU HAVE BEEN REGISTERED SUCCESSFULLY';
        $_SESSION['msg'] = $msg;
        $_SESSION['auth'] = '1001001001';
        header("Location: /home.php");
        createuser($conn,$firstname,$lastname,$email,$phone,$password);
    }
}