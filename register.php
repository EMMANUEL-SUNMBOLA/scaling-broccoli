<?php
include 'head2.php';
?>
<div class="text-center">
<form action="/signup.php" method="POST" id="login_form">
    <h1>SIGN UP🤓</h1>
    <p> <input type="text" name="firstname"  placeholder="FIRST NAME" id="login_form_input" >
        <input type="text" name="lastname"  placeholder="LAST NAME" id="login_form_input" >
    </p>
    <p> <input type="email" name="email"  placeholder="E-MAIL" id="login_form_input" >
        <input type="tel" name="phone"  min="11" placeholder="TELEPHONE" id="login_form_input" >
    </p>
    <p> <input type="password" name="password1"  placeholder="PASSWORD" min="6" id="login_form_input">
        <input type="password" name="password2"  placeholder="CONFIRM YOUR PASSWORD" min="6" id="login_form_input">
    </p>
    <p><button type="submit" id="log_button" name="sign_button">SIGN-UP</button></p>
</form>
</div>
<div class="bg-danger text-center">
    <ul id="list">
<?php 
        $err = $_SESSION['error'];
        if(isset($err) && count($err)>0){
        foreach($err as $value ){
            echo "<li>". $value ."</li>";
            unset($_SESSION['error']);
        }}

    ?>
    </ul>
</div>
<?php include_once "footer.php";?>