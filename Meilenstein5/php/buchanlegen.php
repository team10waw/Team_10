<?php

// Wurden Daten über POST gesendet?
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	//initialisieren den variable file
	$filename = 'books.txt';
	
	// Eingaben aus Formular lesen 
	$eingaben = array() ;
	
	$autorFeld = isset($_POST["autor"]) ? $_POST["autor"] : "";
	$eingaben[] = $autorFeld ;
	
	$titelFeld = isset($_POST["titel"]) ? $_POST["titel"] : "";
	$eingaben[] = $titelFeld ;
	
	$kapitelFeld = isset($_POST["kapitel"]) ? $_POST["kapitel"] : "0";
	$eingaben[] = $kapitelFeld." Kapitel" ;
	
	$buchartFeld = isset($_POST["art"]) ? $_POST["art"] : "";
	$eingaben[] = $buchartFeld ;
	
	$isbnFeld = isset($_POST["isbn"]) ? $_POST["isbn"] : "";
	$eingaben[] = $isbnFeld ;
	
	$erscheinungjahrFeld = isset($_POST["jahr"]) ? $_POST["jahr"] : "";
	$eingaben[] = $erscheinungjahrFeld ;
	
	$auflageFeld = isset($_POST["auflage"]) ? $_POST["auflage"] : "";
	$eingaben[] = $auflageFeld.".Auflage" ;
	
	
	// Schreibt in die File
	
	$handle = fopen($filename,'a');
	
	foreach($eingaben as $value){
		
		fwrite($handle, $value.",\n");
		
	}
	fwrite($handle,"\r\n");
	fclose($handle);
	
	?>
			<script type="text/javascript">  alert("Daten wurden erfolgreich in der TEXT Datei gespeichert !") ;
											location.replace("http://localhost/Meilenstein5/html/book_entry.html");
			</script>
	<?php

}else{
	echo 'fehler' ;
}

?>