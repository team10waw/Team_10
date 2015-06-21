<?php
include 'mysqlConnect.php' ;

// Wurden Daten über POST gesendet?
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)){
	
	$formEingaben = $_POST ;
	unset($formEingaben['uebertragen']) ;
	$dbFelder = "" ;
	$dbValues = "";

	// Eingaben aus Formular lesen 
	
	foreach($formEingaben as $felder => $values){
		
			$dbFelder .= $felder."," ;
			$dbValues .=  is_string($values) ? "'".$values."'," : $values."," ;
			
	}
	
	$dbFelder = substr($dbFelder,0, -1);
	$dbValues = substr($dbValues,0, -1);
	
	$query = "INSERT INTO mybooks ($dbFelder) VALUES ($dbValues) ; " ;
	echo $query ;
	$rep = mysql_send($query) ;
	
		

}else{
	echo 'fehler' ;
}

?>