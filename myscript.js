function pegarSelect(){
	var opcoes = document.getElementById("select").getElementsByTagName("option");
	console.log(opcoes)
	var caracteristicas = []
	for (var i = 0; i < opcoes.length; i++) {
		if (opcoes[i].selected) {
			caracteristicas[i] = opcoes[i].value
			console.log("entrou no if")
		}
	}
	console.log(caracteristicas)
	console.log("@!@!@!@!@!")

	document.getElementById('teste').innerHTML = caracteristicas
	var carac = document.getElementById("teste2")
	carac.value = caracteristicas
	var caminhoArquivo = document.getElementById("arquivo")
	
}

function downloadCSV(csv, filename){
	var csvFile;
	var downloadLink;
	csvFile = new Blob([csv], {type:"text/csv"});
	downloadLink = document.createElement("a");
	downloadLink.download = filename;
	downloadLink.href = window.URL.createObjectURL(csvFile);
	downloadLink.style.display = "none";

	document.body.appendChild(downloadLink);
	downloadLink.click();
}

function exportTableToCSV(filename){
	var csv = [];
	var rows = document.querySelectorAll("table tr");
	console.log(rows);
	for (var i = 0; i < rows.length; i++) {
		var row = [], cols = rows[i].querySelectorAll("td, th");
		for(var j = 0; j <  cols.length; j++){
			row.push(cols[j].innerText);
		}
		csv.push(row.join(","));
	}
	downloadCSV(csv.join("\n"), filename);
}