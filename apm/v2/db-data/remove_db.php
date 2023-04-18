<?php
   $dbhost = 'mysql';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo "Connected successfully\n";
   
   $sql = 'DROP Database test_db';
   $retval = mysql_query( $sql, $conn );
   
   echo  "Database test removed successfully";

   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   

   }
   mysql_close($conn);
?>
