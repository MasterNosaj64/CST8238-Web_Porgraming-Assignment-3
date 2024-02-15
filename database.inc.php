<?php

/*
 Sets up the PDO database connection
*/
function setConnectionInfo() {
      //For EasyPHP Local Webserver
	  /*
	  $connString = "mysql:host=localhost;dbname=books";
      $user = "jasonwai_bookrep"; 
      $password = "book@rep19";
      */
      //For Hebergement Webserver
      
      $connString = "mysql:host=localhost;dbname=jasonwai_books";
      $user = "jasonwai_bookrep";
      $password = "book@rep19";
      
      $pdo = new PDO($connString,$user,$password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;      
}


?>
