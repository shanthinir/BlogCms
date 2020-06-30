<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 14.02.2015
 * Time: 02:37
 * Displays the details of a blog with comments
 */

/**
 * Submit user comments to database
 */
if(isset($_POST['submit'])){
    if(!empty($_POST['commenter_name'])){
        $name= mysql_real_escape_string($_POST['commenter_name']);
        $email= mysql_real_escape_string($_POST['commenter_email']);
        $url= mysql_real_escape_string($_POST['commenter_url']);
        $comment= mysql_real_escape_string($_POST['comment']);
        $blogId = $blogDetail['id'];
        $bh->insertComment($name,$email,$url,$comment,$blogId);
    }
}
?>

<div id="pagewrapper" class="pagewrapper">

    <!-- blog display panel -->
    <div id="blogs_pannel">
        <ul class="blogs">
                <li class="blog">
                    <div id="blog">
                        <div id="blog_title"> <span><?php echo $blogDetail['blog_date'];?></span> <a href = "./?action=detail&&id=<?php echo $blogDetail['id'] ?>"><?php echo $blogDetail['blog_title'];?></a> </div>
                        <div id="blog_text"><?php echo $blogDetail['blog_text'];?></div>
                        <div id="blog_author">Author : <?php echo $blogDetail['blog_author'];?></div>
                    </div>
                </li>
        </ul>
    </div>

    <!-- Comment display panel -->
    <div id="comment_panel">
        <ol>
            <?php foreach($comments as $comment):?>
                <li>
                    <div>
                        <span> <?php echo $comment['date'];?> </span>
                        <span> <?php echo $comment['name'];?> </span>
                        <?php if(!empty($comment['url'])) :?>
                        <span> <?php echo '('.$comment['url'].')';?> </span>
                        <?php endif; ?>
                        <span> : <?php echo $comment['comment'];?> </span>
                    </div>
                </li>
            <?php endforeach ?>
        </ol>
    </div>

    <!-- Comment submit form -->
    <form name="comment_form" method="post" action="./?action=detail&&id=<?php echo $blogDetail['id'] ?>" >
        Name:<br><br>  <input type="text" name="commenter_name" required><br><br>
        Email (optional) :<br><br> <input type="email" name ="commenter_email" ><br><br>
        URL (optional) :<br><br> <input type="text" name ="commenter_url"><br><br>
        Message :<br><br><textarea name="comment" cols="100" rows="10" required></textarea><br><br>
        <input type="submit" name="submit" value="Submit Blog">
    </form>

</div>






