<?php require 'head2.php'?>
<div class="text-center bg-success">
    <?php
        $msg = $_SESSION['msg'];
        if(isset($msg)){
            echo $msg;
            unset($_SESSION['msg']);
        }
    ?>
</div>
<div class="text-center">
<form action="" method="post" id="login_form">
    <h1>SIGN IN 🤭</h1>
    <p>
        <!-- remember to change email in login page to a more suitable name to avoid clash -->
        <input type="email" name="email" id="login_form_input" placeholder="E-MAIL" >
    </p>
    <p><input type="password" name="password" id="login_form_input" placeholder="PASSWORD" ></p>
    <p><button type="submit" id="log_button">SING-IN</button></p>
    <p>Dont't have a account yet? <a href="/register.php">Sign-up</a></p>
</form>
</div>
<?php include_once "footer.php";?>