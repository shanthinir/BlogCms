<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 13.02.2015
 * Time: 22:13
 * Starting point of the application.Maps action to the respective templates.
 */
 session_start();
 require_once('./blogModel.php');
 include "templates/header.php";
 $bh= new blogModel();
?>

<!-- include menu template -->
<?php include "templates/menuBar.php" ?>

<!-- maps action to templates -->
<?php
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "index";
    $id = isset( $_GET['id'] ) ? $_GET['id'] : "";

        if($action == "detail"){
            $blogDetail=$bh->getBlogModel($id);
            $comments= $bh->getComments($id);
            include "templates/blogDetail.php";
        }
        elseif($action == "submitBlog"){
            include "templates/submitBlog.php";
        }
        elseif($action == "search"){
            include "templates/search.php";
        }
        elseif($action == "contact"){
            include "templates/contact.php";
        }
        elseif($action == "login"){
            include "templates/login.php";
        }
        elseif($action == "logout"){
            include "templates/logout.php";
        }
        else{
            $blogs = $bh->getAllBlogs();
            include "templates/landingPage.php";
        }
?>

<!-- include footer template -->
<?php include "templates/footer.php" ?>
