<?php
include "mysqlConnect.php";

/**
Die Datei Schreibt Json Daten in der Datenbank und  darf nur ein mal aufgerufen werden
*/
 // $buchart = Array("../js/roman_books.json", "../js/horror_books.json");
  
  $jsonFile ="../js/roman_books.json";
  $data = file_get_contents($jsonFile);
  $data = json_decode($data, true) ; // array
  
  // Query
  
 $dbFelder = "" ;
 $dbvalues = "" ;
 
 foreach($data as $bookdata){
 
	foreach($bookdata as $bookValues){
	
		foreach($bookValues as $felder => $values){
		
			$dbFelder .= $felder."," ;
			$dbvalues .=  is_string($values) ? "'".$values."'," : $values."," ;
			
		}
		
		$dbFelder = substr($dbFelder,0, -1);
		$dbvalues = substr($dbvalues,0, -1);
		
		$query = "INSERT INTO roman_books ($dbFelder) VALUES ($dbvalues) ; " ;
		
		$rep = mysql_send($query) ;
		 		
		$dbFelder = "" ;
        $dbvalues = "" ;
 
	
	}
	
 }
  
  
  
  

?>