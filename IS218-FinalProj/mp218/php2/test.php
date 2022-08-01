<?php
//add the database file.MAI
require ('database.php');
//get the value from signup.html page.MAI
$firstName = $_POST['fName'];
$lastName = $_POST['lName'];
$email = $_POST['eMail'];
$password = $_POST['psWord'];
$college = $_POST['colLege'];
$major = $_POST['maJor'];
//use a boolean value.MAI
$boolValue=false;

//write the query to check if there is already an email in the database.Mai
$queryEmail="SELECT * from UserData WHERE Email='$email'; ";

//prepare the statement.MAI
$statement1=$db->prepare($queryEmail);
$statement1->execute();
$results=$statement1->fetchALL();
$statement1->closeCursor();
//create a variable which will store the fetched email from database.MAI
$match=null;
try{
    foreach ($results as $result):
//if there is an email already in the database $match will store that value.MAI
        $match=$result[2];



    endforeach;
    //if there is already an email,promt the user to enter a different email.MAI (THIS IS WHAT I CHANGED)
    function function_alert($message) {
        echo "<script>window.alert('$message'); window.location.href='../html/signup.html';</script>";
    }

    if($match!=null){
       function_alert("There is already an email associated to this account");
    }
    //else enter the value into the database and let the user know that it was a success.
 else{
     $sql2 = "INSERT INTO User  VALUES  ('$firstName','$lastName','$email','$password','$college','$major')";

     $statement1=$db->prepare($sql2);
     $statement1->execute();

     header("Location:../html/login.html");
    }





}
catch(Exception $e){
    $error_message=$e->getMessage();
    include('database_error.php');
    exit();
}

