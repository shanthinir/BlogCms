<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 14.02.2015
 * Time: 23:48
 * Submit Blog Page
 */

/**
 * Parses the submitted blog entry and saves to database
 */
if(isset($_POST['submit'])){
    if(!empty($_POST['author_name'])){
        $author= mysql_real_escape_string($_POST['author_name']);
        $title= mysql_real_escape_string($_POST['blog_title']);
        $text= mysql_real_escape_string($_POST['blog_message']);
        $bh->insertBlog($author,$title,$text);
    }
}
?>

<!-- Blog Submit Form -->
<form method="post" action="./?action=submitBlog" >
    Name:<br><br>  <input type="text" name="author_name" required><br><br>
    Blog Title:<br><br> <input type="text" name ="blog_title" required><br><br>
    Blog Text:<br><br><textarea name="blog_message" cols="100" rows="10" required></textarea><br><br>
    <input type="submit" name="submit" value="Submit Blog">
</form>