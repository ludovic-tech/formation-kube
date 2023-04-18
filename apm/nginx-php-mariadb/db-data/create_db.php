<?php
   $dbhost = 'mysql';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo "Connected successfully\n";
   
   $sql = 'CREATE Database test_db';
   $retval = mysql_query( $sql, $conn );
   
   echo  "Database test_db created successfully\n";

   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   

   }
   mysql_close($conn);
?>
