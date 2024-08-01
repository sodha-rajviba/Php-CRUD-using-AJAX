<?php 

$username=$_POST['username'];
$password=$_POST['password'];

require "../includes/connection.php";

$query="INSERT INTO `User`(`Username`,`Password`) VALUES (?,?);";
$params = [$username, $password];

$statement = $connection->prepare($query);
$row = $statement->execute($params);

if($row>0)
    return header('Location:../index.php');
else
    echo "Error in data insertion.";


?>