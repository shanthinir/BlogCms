<?php
/**
 * Created by PhpStorm.
 * User: Shanthini
 * Date: 13.02.2015
 * Time: 22:11
 * Handles Database connection
 */
require_once('bootstrap.php');

class databaseConnector{

   public static function dbConnect(){
       $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
       OR die("Error connecting to Database");
       return $dbc;
   }
}
