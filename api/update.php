<?php 

$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];

require "../includes/connection.php";

$query="UPDATE `User` SET Username=(?), Password=(?) WHERE Id=(?)";
$params = [$id,$username,$password];

$statement = $connection->prepare($query);
$row = $statement->execute($params);

if($row>0)
    return header('Location:../index.php');
else
    echo "Error in data updation.";


?>