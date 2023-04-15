<?php
$serverName ="localhost";
$userName="root";
$password ="";
$dbName="test";
    

$conn = mysqli_connect($serverName,$userName,$password,$dbName); 
if(mysqli_connect_error()){
    echo"failed";
    exit();
    
}
echo"connected";
?>