<?php
/**
 * This function connects to the MYSQL database.  
*/

//Database connection details 
$servername = 'nuwebspace_db';
$username = 'w21005067';
$password = 'Matteo0710';
$dbname = 'w21005067';
// Create a comnnection to the database 
$conn = mysqli_connect($servername,$username, $password, $dbname)
// Display an error message if connection has failed 
or die ("Can not connect to DB");
?>