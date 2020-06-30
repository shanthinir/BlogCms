<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 13.02.2015
 * Time: 22:13
 * Homepage/Landing page of the application
 */
?>

<!-- Blog display panel -->
<div id="pagewrapper" class="pagewrapper">
    <div id="blogs_pannel">
        <ul class="blogs">
            <?php foreach($blogs as $blog) : ?>
                <li class="blog">
                    <div id="blog">
                        <div id="blog_title"> <span><?php echo $blog['blog_date'];?></span> <a href = "./?action=detail&&id=<?php echo $blog['id'] ?>"><?php echo $blog['blog_title'];?></a> </div>

                        <!-- Limits text characters to 1000 and appends a trailer to the text  -->
                        <div id="blog_text"><?php echo strlen($blog['blog_text'])>999?substr($blog['blog_text'],0,999)."...":$blog['blog_text'];?></div>
                        <div id="blog_author">Author : <?php echo $blog['blog_author'];?></div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>