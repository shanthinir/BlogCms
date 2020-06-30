<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 15.02.2015
 * Time: 01:43
 * Login page
 */

/**
 * verifies login credentials with database
 */
if(isset($_POST['submit'])){
    if(!empty($_POST['user_name'])){
        $userName= mysql_real_escape_string($_POST['user_name']);
        $password= mysql_real_escape_string($_POST['password']);
        $bh->checkUser($userName,$password);
    }
}
?>

<!-- Login Form -->
<form name="loginForm" method="post" action="./?action=login" >
    User Name:<br><br>  <input type="text" name="user_name"><br><br>
    Password:<br><br> <input type="password" name ="password"><br><br>
    <input type="submit" name="submit" value="Login">
</form>
