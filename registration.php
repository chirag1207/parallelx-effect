<?php

$fname = $_POST['fname'];
$lname  = $_POST['lname'];
$email  = $_POST['email'];
$phone= $_POST['phone'];
$age= $_POST['age'];




// Database connection
$conn = new mysqli('localhost','root','','parallax');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {

    $stmt = $conn->prepare("insert into registration(fname,lname,email,phone,age) values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$fname, $lname, $email, $phone,$age);



    $execval = $stmt->execute();
    echo $execval;	
    echo '<script language="javascript">';
    echo 'alert("Successfully Registered.");';
    echo 'location.href="index.html"';
    echo '</script>';
    
    $stmt->close();
    $conn->close();
}
?>