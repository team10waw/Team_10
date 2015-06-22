<?php
function mysql_send($query){
$host = "localhost";
$user = "root";
$pwd = "";
$dbName = "mybooks";
$dbh = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);
$stmt = $dbh->prepare($query);
$stmt->execute();
return $stmt ;

}

// $pstm->fetch()
	
?>