<?php
include 'mysqlConnect.php' ;

if(!empty($_GET)){

	if(isset($_GET['type']) && $_GET['type'] == "roman"){
		$tabelle ="roman_books";
		$bookdata = 'romandata' ;
	}elseif(isset($_GET['type']) && $_GET['type'] == "horror"){
		$tabelle ="horror_books";
		$bookdata = 'horrordata' ; 
	}	
	
	// Liest Daten aus der DB
	
	$query = "SELECT * FROM $tabelle ;" ;
    $rep = mysql_send($query) ;
	
	$book = array(
		$bookdata => array()
	);
	
	while($res = $rep->fetch(PDO::FETCH_ASSOC)){
		
		unset($res['ID']) ;
		$book[$bookdata][] = $res ;
	
	}
	
	// Array in Json Konverzieren und an den Client schicken 
	
	echo json_encode($book);
	
}else{
	echo 'Fehler' ;
}
	
  


?>