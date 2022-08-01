<?php
$dsn='mysql:host=sql.njit.edu; dbname=pf23';
$username = "pf23";
$password = "rEnee8@!@8!4";

try{
    $db=new PDO($dsn,$username,$password);
    echo "HI";
}
catch(PDOException $e){
   $error_message=$e->getMessage();
   include('database_error.php');
   exit();
}
?>