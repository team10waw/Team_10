<?php
	if(isset($_GET['type']) && $_GET['type'] == "roman"){
		$jsonFile ="../js/roman_books.json";
	}elseif(isset($_GET['type']) && $_GET['type'] == "horror"){
		$jsonFile ="../js/horror_books.json";
	}	
  $data = file_get_contents($jsonFile);
  echo $data  ;


?>