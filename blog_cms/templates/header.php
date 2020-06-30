<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 13.02.2015
 * Time: 23:51
 */
$action = isset( $_GET['action'] ) ? $_GET['action'] : "index";
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head tag of the website  -->
<head>
    <title>Simple Blog</title>
    <link rel="stylesheet" type="text/css" href= "css/main.css" />
</head>
<body>
<div id="container">

    <!-- Header with logo and title  -->
    <div id="header" class="header">
        <span class="logo">
            <a href="index.php"><img id="logo" src="images/logo.jpg" alt="Blog Logo" /></a>
        </span>
        <span class="header_title">
            <h1>Bloggers Blog</h1>
        </span>
    </div>
