<?php
include 'mysqlConnect.php' ;

// Wurden Daten über POST gesendet?
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)){
	
	
	//------------------------check Formular-------------------------------------------------
	
	// Formular eingaben Überprüfen
	$fehler = false ;
	
	function test_input($data) {
		$data = trim($data);     // Leerzeichen vor und nach Eingaben wegmachen
		$data = stripslashes($data);    // Entfernt Maskierungszeichen aus der Eingabe
		$data = htmlspecialchars($data);  // Wandelt Sonderzeichen in HTML
		return $data;
	}
	
	
	// Vornam, Nachname und Buchautor dürfen nur Buchsteiben sein
	
	$vorname = test_input($_POST['vorname']) ;
	if (!preg_match("/^[a-zäöüßA-ZÄÖÜ ]*$/",$vorname)) {
       $fehler = true ; 
     }elseif($vorname == ""){
		$fehler = true ; 
	 }
	 
	$nachname = test_input($_POST['name']) ;
	if (!preg_match("/^[a-zäöüßA-ZÄÖÜ ]*$/",$nachname)) {
       $fehler = true ; 
     }elseif($nachname == ""){
		$fehler = true ; 
	 }
	
	$autor = test_input($_POST['autor']) ;
	if (!preg_match("/^[a-zäöüßA-ZÄÖÜ ]*$/",$autor)) {
       $fehler = true ; 
     }elseif($autor == ""){
		$fehler = true ; 
	 }
	
	
	// ISBN darf maximal 13 Zeichen sein
	
	$isbn = test_input($_POST['isbn']) ;
	if (!preg_match("/^[0-9]*$/",$isbn)) {
       $fehler = true ; 
     }elseif(strlen($isbn)>13){
		$fehler = true ; 
	 }
	
	// Das Erscheinungsjahr darf nicht negativ und größer als das aktuelle Datum sein
	
	date_default_timezone_set('Europe/Berlin');
    $datum = date("Y"); // aktuelles Datum
	$jahr = test_input($_POST['jahr']) ;
	if (!preg_match("/^[0-9]*$/",$jahr)) {
       $fehler = true ; 
     }elseif(strlen($jahr)>4 || $jahr < 0){
		$fehler = true ; 
	 }elseif($jahr > $datum){
		$fehler = true ; 
	 }
	
	// Auflage darf nicht negativ sein
	$auflage = test_input($_POST['auflage']) ;
	if (!preg_match("/^[0-9]*$/",$auflage)) {
       $fehler = true ; 
     }elseif($auflage < 0){
		$fehler = true ; 
	 }
	 
	 
	 //Titel muss eingegeben werden
	 
	 $titel = test_input($_POST['titel']) ;
	 if ($titel == "") {
       $fehler = true ; 
     }
	 
	
   // im Korrekten Fall werden Daten in der DB gespeichern
	
	if($fehler == false){
	
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
		
		$rep = mysql_send($query) ;
	
	}else{
		?>
			<script type="text/javascript"> alert("Einige Eingaben sind fehlerhaft. Bitte ueberpruefen Sie ihre Eingaben"); 
											location.replace("http://localhost/Meilenstein6/html/book_entry.html");
			</script>
		<?php
		
		
	}	

}else{
	echo 'Fehlende Parameter' ;
}

?>