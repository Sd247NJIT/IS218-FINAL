<?php
require ('database.php');

//get the username and password.MAI
$username=$_POST['usName'];
$password = $_POST['psWord'];

$match=null;



$queryEmail="SELECT * from User WHERE Email='$username'; ";

$statement1=$db->prepare($queryEmail);
$statement1->execute();
$results=$statement1->fetchALL();
$statement1->closeCursor();

try{
    foreach ($results as $res):

        $match= $res[3]."<br>";


    endforeach;
}
catch(Exception $e){
    $error_message=$e->getMessage();
    include('database_error.php');
    exit();
}
function function_alert($message) {
    echo "<script>window.alert('$message'); window.location.href='../html/login.html';</script>";
}

if($match==null){
    function_alert("Invalid Email!");
}

$validate=strcmp($match,$password);

if($validate==4){
    header("Location:../html/content.html");
}else{
    function_alert("Invalid Password!");
}





?>