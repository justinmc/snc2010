<?php 

// This file contains all of the low level functions that deal directly with the databases, ect.      
      
// Database Data //

$server = "aiesecmi.ipowermysql.com";
$username = "aiesecmi";
$password = "wolverine.2";
$db = "sum_conf_10";
$table = "content";																								// Player Stats Table

// Functions //

function getdb ($index, $table)																								// Accesses the database, given table at given row
{
   global $server, $username, $password, $db;

   $con = mysql_connect($server, $username, $password);
   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db($db);

   $QUERY = mysql_query("SELECT * FROM `content` WHERE CONVERT( `index` USING utf8 ) = $index");
   $DATA = mysql_fetch_array($QUERY);

   mysql_close($con);

   return ($DATA);
}

// Returns the number of rows in the given table
function getrows ($where)
{
   global $server, $username, $password, $db;

   $con = mysql_connect($server, $username, $password);
   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db($db);
      
   $QUERY = mysql_query("SELECT * FROM $where");   
   $rows = 0;
   $rows = mysql_num_rows($QUERY);

   mysql_close($con);

   return ($rows);
}

function echoDB($filename, $what)
{
   global $server, $username, $password, $db;

   $con = mysql_connect($server, $username, $password);
   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }

   mysql_select_db($db);

   $QUERY = mysql_query("SELECT * FROM content WHERE address = '$filename'");

   $DATA = mysql_fetch_array($QUERY);
   echo $DATA[$what] . "\n\n";

   mysql_close($con);

}









?>