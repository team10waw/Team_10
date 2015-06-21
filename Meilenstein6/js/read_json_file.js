	/**
	* Die Methode legt eine neue Tabelle ein
	*/
	
	function getData(book_type) {
	
		// entfern die alte Tabelle, wenn Vorhand
		
		var div = document.getElementById("table_data");
		var alt_table_horror = document.getElementById("horrordata");
		var alt_table_roman = document.getElementById("romandata");
		if ( typeof (alt_table_horror) != 'undefined' && alt_table_horror != null) {
			div.removeChild(alt_table_horror);
		}
		if(typeof (alt_table_roman) != 'undefined' && alt_table_roman != null){
			div.removeChild(alt_table_roman);
		}

	
	// Unterscheid erst mal welches Buch Type gelesen wird
	
		if (book_type == "roman") {

			//Button  Roman als selectiert markieren
			document.getElementById("roman").style.backgroundColor = "rgb(63, 72, 204)";
			document.getElementById("horror").style.backgroundColor = "rgb(0,162,232)";
			
			
			// ID der Tabelle
			var table_id = "romandata";
			
			
			// Parameter bei Datei Aufruf
			var param = "type=roman";

		} else {
			
				// horror Bücher

			//Button als selectiert markieren
			document.getElementById("horror").style.backgroundColor = "rgb(63, 72, 204)";
			document.getElementById("roman").style.backgroundColor = "rgb(0,162,232)";

			
			// ID der Tabelle
			var table_id = "horrordata";
			
			
			// Parameter bei Datei Aufruf
			var param = "type=horror";
			
			};
			

			// legt eine neue Tabelle ein
			var table_book = document.createElement("table");
			table_book.id = table_id ;
			table_book.style.marginLeft = "183px";
			table_book.style.marginRight = "183px";
			var tr = document.createElement("tr");

			
			//  Tabelle Titel

			var autor = document.createTextNode("Autor");
			var th1 = document.createElement("th");
			
			th1.appendChild(autor);
			tr.appendChild(th1);

			var titel = document.createTextNode("Titel");
			var th2 = document.createElement("th");
			th2.style.width = "200px";
			th2.style.height = "20px" ;
			th2.appendChild(titel);
			tr.appendChild(th2);

			var kapitel = document.createTextNode("Kapitel");
			var th3 = document.createElement("th");
			th3.appendChild(kapitel);
			tr.appendChild(th3);

			var buchart = document.createTextNode("Buchart");
			var th4 = document.createElement("th");
			th4.appendChild(buchart);
			tr.appendChild(th4);

			var isbnb = document.createTextNode("ISBN");
			var th5 = document.createElement("th");
			th5.appendChild(isbnb);
			tr.appendChild(th5);

			var erscheinungsjahr = document.createTextNode("Erscheinungsjahr");
			var th6 = document.createElement("th");
			th6.appendChild(erscheinungsjahr);
			tr.appendChild(th6);

			var auflage = document.createTextNode("Auflage");
			var th7 = document.createElement("th");
			th7.appendChild(auflage);
			tr.appendChild(th7);

			table_book.appendChild(tr);
			div.appendChild(table_book);

			
			// list Data aus Json-File und schreibt in die Tabelle
			read_file(param,table_id);

		

	}

	
	/**
	 * Die Methode das Verzeichnis für eine Json File(Roman)
	 * liest die Json Daten und schreibt dann in die Tabelle Roman
	*/
	function read_file(param,table_id) {

		var file = "../php/getBooks.php?"+param ;
		var req = new XMLHttpRequest();
		req.open("GET", file, true);
		
				
		req.onreadystatechange = function() {
			if (req.readyState == 4 && req.status == 200) {
				var doc = eval('(' + req.responseText + ')');
				var table = document.getElementById(table_id);
				
				if(table_id == "romandata"){
					var book_data = doc.romandata ;				
				}else{
					var book_data = doc.horrordata ;	
				}
				

				for (var i = 0; i < book_data.length; i++) {

					var tr = document.createElement("tr");

					var td1 = document.createElement("td");
					var autor = document.createTextNode(book_data[i].autor);
					td1.appendChild(autor);
					tr.appendChild(td1);

					var td2 = document.createElement("td");
					var titel = document.createTextNode(book_data[i].titel);
					td2.appendChild(titel);
					tr.appendChild(td2);

					var td3 = document.createElement("td");
					var kapitel = document.createTextNode(book_data[i].kapitel);
					td3.appendChild(kapitel);
					tr.appendChild(td3);

					var td4 = document.createElement("td");
					var buchart = document.createTextNode(book_data[i].buchart);
					td4.appendChild(buchart);
					tr.appendChild(td4);

					var td5 = document.createElement("td");
					var ISBN = document.createTextNode(book_data[i].ISBN);
					td5.appendChild(ISBN);
					tr.appendChild(td5);

					var td6 = document.createElement("td");
					var erscheinungsjahr = document.createTextNode(book_data[i].erscheinungsjahr);
					td6.appendChild(erscheinungsjahr);
					tr.appendChild(td6);

					var td7 = document.createElement("td");
					var auflage = document.createTextNode(book_data[i].auflage);
					td7.appendChild(auflage);
					tr.appendChild(td7);

					table.appendChild(tr);

				};

			};
		};

		req.send(null);

	}
		
	

	