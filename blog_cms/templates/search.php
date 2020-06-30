<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 14.02.2015
 * Time: 13:37
 * Search page
 */

/**
 * Parses the search text and retrieves matches from database
 */
if(isset($_POST['submit'])) {
    $searchText = stripslashes(trim($_POST['search_text']));
    $searchText = mysql_real_escape_string($searchText);
    $bh = new blogModel();
    $searchResults = $bh->searchBlog($searchText);
}
?>

<!-- Search Form -->
<form name="search_form" method="post" action="./?action=search" >
    Search Text :<br><br>  <input type="text" name="search_text"><br><br>
    <input type="submit" name="submit" value="Search">
</form>

<!-- Results display panel -->
<div id="pagewrapper" class="pagewrapper">

    <div id="blogs_pannel">

        <ul class="blogs">
            <?php if(!empty($searchResults)) :?>
            <?php foreach($searchResults as $blog) : ?>
                <li class="blog">
                    <div id="blog">
                        <div id="blog_title"> <span><?php echo $blog['blog_date'];?></span> <a href = "./?action=detail&&id=<?php echo $blog['id'] ?>"><?php echo $blog['blog_title'];?></a> </div>
                        <?php if(strlen($blog['blog_text'])>9) $blog['blog_text']= substr($blog['blog_text'],9)."...";?>
                        <div id="blog_text"><?php echo $blog['blog_text'];?></div>
                        <div id="blog_author">Author : <?php echo $blog['blog_author'];?></div>
                    </div>
                </li>
            <?php endforeach ?>
            <?php elseif(isset($_POST['submit'])): ?>
                <li class="blog">
                    <div id="blog">
                        There are no results matching your search.
                    </div>
                </li>
            <?php endif ?>
        </ul>

    </div>

</div>