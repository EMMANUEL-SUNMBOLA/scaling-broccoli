<?php


function emailmax(string $value){
    if(strlen($value) > 225){
        return false;
    }
    return true;
}
function invalidusername(string $value){
    // can use this to check how strong the password is later sha....
    // should've used pregmatch
if(!str_contains($value,'!')){
if(!str_contains($value,'@')){
if(!str_contains($value,'$')){
if(!str_contains($value,'%')){
if(!str_contains($value,'^')){
if(!str_contains($value,'&')){
if(!str_contains($value,'*')){
if(!str_contains($value,'(')){
if(!str_contains($value,')')){
if(!str_contains($value,'+')){
if(!str_contains($value,'=')){
if(!str_contains($value,'_')){
if(!str_contains($value,'}')){
if(!str_contains($value,'{')){
if(!str_contains($value,'[')){
if(!str_contains($value,']')){
if(!str_contains($value,':')){
if(!str_contains($value,';')){
if(!str_contains($value,'?')){
if(!str_contains($value,'.')){
if(!str_contains($value,',')){
if(!str_contains($value,'|')){
return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
return false;
}
function checkupper(string $value){
    if(ctype_upper(substr($value,0,1)) == true){
        return true;
    }
    return false;
}
function passstrength(string $value){
    if(!preg_match("/a-zA-Z1-9/",$value) == true){
        return true;
    }
    return false;
}
function userexists($conn,$email){
    $sql = "SELECT * FROM users WHERE usersPhone = ? OR usersEmail = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        return true;
    }
    mysqli_stmt_bind_param($stmt,"ss",$email,$phone);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    else{
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }
}
function createuser($conn,$firstname,$lastname,$email,$phone,$password){

    $sql = "INSERT INTO users (usersFirstname,usersLastname,usersEmail,usersPhone,usersPassword) VALUES(?,?,?,?,?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        return true;
    }

     $hashedpassword = password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$email,$phone,$hashedpassword);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return false;
}