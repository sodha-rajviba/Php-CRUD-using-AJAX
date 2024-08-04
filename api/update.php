<?php 

header("Content-type:application/json");

$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];

require "../includes/connection.php";

$query="UPDATE `User` SET Username=(?), Password=(?) WHERE Id=(?)";
$params = [$id,$username,$password];

$statement = $connection->prepare($query);
$row = $statement->execute($params);

if($row>0)
    echo json_encode(['success'=>true]);
else
    echo json_encode(['success'=>false]);


?>