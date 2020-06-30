<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 15.02.2015
 * Time: 01:17
 * Contact form
 */

/**
 * Process the contact message and sends email
 */
if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_message'])){
    $contact_name=mysql_real_escape_string($_POST['contact_name']);
    $contact_email=mysql_real_escape_string($_POST['contact_email']);
    $contact_message=mysql_real_escape_string($_POST['contact_message']);

    if(!empty($contact_name) && !empty($contact_email) && !empty($contact_message))
    {
        $to="shanthinirajarathinam7@gmail.com";
        $subject="Message from Contact form";
        $body=$contact_name.$contact_message;
        $header= 'From: '.$contact_email;

        try{
            mail($to,$subject,$body,$header);
            echo'Message sent successfully';
        }
        catch(Exception $e){
            echo'Error sending Message.Please try again later';
        }
    }
}
?>

<!-- Contact form display panel  -->

<form method="post" action="./?action=contact" >
    Name:<br><br>  <input type="text" name="contact_name"><br><br>
    Email:<br><br> <input type="email" name ="contact_email"><br><br>
    Message:<br><br><textarea name="contact_message" cols="30" rows="6"></textarea><br><br>
    <input type="submit" value="Send">
</form>