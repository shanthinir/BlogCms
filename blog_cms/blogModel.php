<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 13.02.2015
 * Time: 22:55
 * Model class which handles all database transactions.
 */
require_once('./app/dbConnect.php');

class blogModel{
    /**
     * @return array|null
     * Function to retrieve all blog details from database
     */
    public function getAllBlogs(){

        $dbc = databaseConnector::dbConnect();
        $query="SELECT  * FROM blogs";
        $queryResult= mysqli_query($dbc,$query);
        $results= mysqli_fetch_all($queryResult,MYSQLI_ASSOC);
        return $results;
    }

    /**
     * @param $id
     * @return array|null
     * Function to retrieve the details of blog with passed id
     */
    public function getBlogModel($id){

        $dbc = databaseConnector::dbConnect();
        $query="SELECT  * FROM blogs WHERE id = '$id'";
        $queryResult= mysqli_query($dbc,$query);
        $results= mysqli_fetch_array($queryResult,MYSQLI_ASSOC);
        return $results;
    }

    /**
     * @param $author
     * @param $title
     * @param $text
     * Function to insert blog submitted by user to database.
     */
    public function insertBlog($author,$title,$text){

        $date = date("Y-m-d");
        $dbc = databaseConnector::dbConnect();
        $query= "INSERT INTO blogs(blog_title,blog_text,blog_author,blog_date) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($dbc,$query);
        mysqli_stmt_bind_param($stmt,"ssss",$title,$text,$author,$date);
        mysqli_stmt_execute($stmt);
        $affected_rows= mysqli_stmt_affected_rows($stmt);
        if($affected_rows==1)
            echo'added successfully';
        else
            echo'error occurred';
    }

    /**
     * @param $userName
     * @param $password
     * Function to check login credentials
     */
    public function checkUser($userName,$password){

        $dbc = databaseConnector::dbConnect();
        $query= "SELECT * FROM users WHERE user_name = '$userName' AND password = '$password'";
        $queryResult= mysqli_query($dbc,$query);
        $affected_rows= mysqli_num_rows($queryResult);
        if($affected_rows ==1){
            echo'Login successful';
            $_SESSION['userName']= $userName;
            header('Location:index.php');
        }
        else
            echo'error occurred';
    }

    /**
     * @param $blog_id
     * @return array|null
     * Function to retrieve all the comments of a blog with passed in id.
     */
    public function getComments($blog_id){

        $dbc = databaseConnector::dbConnect();
        $query= "SELECT * FROM comments WHERE blog_id = '$blog_id'";
        $queryResult= mysqli_query($dbc,$query);
        $results= mysqli_fetch_all($queryResult,MYSQLI_ASSOC);
        return $results;
    }

    /**
     * @param $name
     * @param $email
     * @param $url
     * @param $comment
     * @param $id
     * Function to insert the users comments to database.
     */
    public function insertComment($name,$email,$url,$comment,$id){

        $date = date("Y-m-d");
        $dbc = databaseConnector::dbConnect();
        $query= "INSERT INTO comments(name,email,url,comment,blog_id,date) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($dbc,$query);
        mysqli_stmt_bind_param($stmt,"ssssss",$name,$email,$url,$comment,$id,$date);
        mysqli_stmt_execute($stmt);
        $affected_rows= mysqli_stmt_affected_rows($stmt);
        if($affected_rows==1){
            echo'added successfully';
            header('Location:./?action=detail&&id='.$id);
        }
        else
            echo'error occurred';
    }

    /**
     * @param $searchText
     * @return array|null
     * Function to retrieve results for search term
     */
    public function searchBlog($searchText){

        $dbc = databaseConnector::dbConnect();
        $query="SELECT  * FROM blogs WHERE blog_text LIKE '%$searchText%' OR blog_title LIKE '%$searchText%'";
        $queryResult= mysqli_query($dbc,$query);
        $results= mysqli_fetch_all($queryResult,MYSQLI_ASSOC);
        return $results;
    }
}