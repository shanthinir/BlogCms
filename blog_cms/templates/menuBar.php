<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 14.02.2015
 * Time: 00:44
 */
?>

<!-- Horizontal Menu bar for the website -->

<div>
        <a class ="menu_item" href="index.php"> Home </a>

    <?php if(empty($_SESSION['userName'])): ?>
        <a class ="menu_item" href="./?action=login"> Login </a>
    <?php endif?>

    <!-- Displayed only if the user is logged in -->
    <?php if(!empty($_SESSION['userName'])): ?>
        <a class ="menu_item" href="./?action=submitBlog"> Submit Blog </a>
        <a class ="menu_item" href="./?action=logout"> Logout </a>
    <?php endif?>

        <a class ="menu_item" href="./?action=search"> Search </a>
        <a class ="menu_item" href="./?action=contact"> Contact </a>
</div>