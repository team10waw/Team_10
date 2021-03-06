function chekFormular() {

	var error = false;
	var focus = false;

	// Vorname, Name und  Buchautor dürfen nur Buchstaben enthalten

	//vorname
	if (document.Formular.vorname.value.search(/^[a-zäöüßA-ZÄÖÜ ]+$/) == -1) {

		error = true;
		document.Formular.vorname.style.borderWidth = "2px";
		document.Formular.vorname.style.borderColor = "red";
		
		if(focus == false){
			focus = true ;
			document.Formular.vorname.focus();
		}
		

	}

	//Name
	if (document.Formular.name.value.search(/^[a-zäöüßA-ZÄÖÜ ]+$/) == -1) {

		error = true;
		document.Formular.name.style.borderWidth = "2px";
		document.Formular.name.style.borderColor = "red";
		
		if(focus == false){
			focus = true ;
			document.Formular.name.focus();
		}
		
		

	}

	// Buchautor
	if (document.Formular.autor.value.search(/^[a-zäöüßA-ZÄÖÜ ]+$/) == -1) {

		error = true;
		document.Formular.autor.style.borderWidth = "2px";
		document.Formular.autor.style.borderColor = "red";
		
		if(focus == false){
			focus = true ;
			document.Formular.autor.focus();
		}
		
		

	}

	//ISBN:  maximal 13 Zahlen enthalten
	if (document.Formular.isbn.value.search(/^[0-9]+$/) != -1) {
		if (document.Formular.isbn.value.length > 13) {

			error = true;
			document.Formular.isbn.style.borderWidth = "2px";
			document.Formular.isbn.style.borderColor = "red";
			
			if(focus == false){
			focus = true ;
			document.Formular.isbn.focus();
			}
			
			
		}

	} else {

		error = true;
		document.Formular.isbn.style.borderWidth = "2px";
		document.Formular.isbn.style.borderColor = "red";
		
		if(focus == false){
			focus = true ;
			document.Formular.isbn.focus();
		}
		
		

	}

	//Erscheinungsjahr: darf nur maximal 4 Zahlen enthalten, darf nicht negativ sein und kann nicht größer als das aktuelle Jahr sein

	if (document.Formular.jahr.value.search(/^[0-9]+$/) != -1) {
		if (document.Formular.jahr.value.length < 5) {
			if (document.Formular.jahr.value >= 0) {
				var date = new Date();
				var jahr = date.getFullYear();
				// aktuelles Jahr
				if (document.Formular.jahr.value > jahr) {

					error = true;
					document.Formular.jahr.style.borderWidth = "2px";
					document.Formular.jahr.style.borderColor = "red";
					
					if(focus == false){
						focus = true ;
						document.Formular.jahr.focus();
					}
					
					

				};

			} else {

				error = true;
				document.Formular.jahr.style.borderWidth = "2px";
				document.Formular.jahr.style.borderColor = "red";
				
				if(focus == false){
						focus = true ;
						document.Formular.jahr.focus();
				}
				
				

			};
		} else {

			error = true;
			document.Formular.jahr.style.borderWidth = "2px";
			document.Formular.jahr.style.borderColor = "red";
			
			if(focus == false){
				focus = true ;
				document.Formular.jahr.focus();
			}
			
			
		}

	} else {

		error = true;
		document.Formular.jahr.style.borderWidth = "2px";
		document.Formular.jahr.style.borderColor = "red";
		
		if(focus == false){
			focus = true ;
			document.Formular.jahr.focus();
		}
		
		

	}

	// Auflage darf  nur eine einzige nicht negative Zahl enthalten.

	if (document.Formular.auflage.value.search(/^[0-9]+$/) != -1) {
		if (document.Formular.auflage.value < 0) {

			error = true;
			document.Formular.auflage.style.borderWidth = "2px";
			document.Formular.auflage.style.borderColor = "red";
			
			if(focus == false){
				focus = true ;
				document.Formular.auflage.focus();
			}
			
			
		}

	} else {

		error = true;
		document.Formular.auflage.style.borderWidth = "2px";
		document.Formular.auflage.style.borderColor = "red";
		
		if(focus == false){
			focus = true ;
			document.Formular.auflage.focus();
		}
		
		

	}

	if (error == true) {
		alert("Einige Eingaben sind fehlerhaft. Bitte überprüfen Sie ihre Eingaben");
		return false;
	} else {
		return true;
	}

}