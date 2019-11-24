//recebe duas classes como parametros e inverte o display delas entre block ou none(visivel ou oculto)
//[funcionando somente com a classe cadastro e login]
function mudarestado(classeB, classeA){
	var displayValueClasseA = document.getElementsByClassName(classeA)[0].style.display;
	if(displayValueClasseA == "block"){
		document.getElementsByClassName(classeA)[0].style.display = 'none';
		document.getElementsByClassName(classeB)[0].style.display = 'block';
		}
	else{
		document.getElementsByClassName(classeA)[0].style.display = 'block';
		document.getElementsByClassName(classeB)[0].style.display = 'none';
	}
}
