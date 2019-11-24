function mudarCorButtonsMenu(classOfButtons, numButtom){
	var colorValue = document.getElementsByClassName(classOfButtons);
	for (var i = 0; i < colorValue.length; i++) {
		if(i == numButtom){
			colorValue[i].style.color = "red";
		}
		else{
			colorValue[i].style.color = "white";
		}
	}
}

function exibirMenuPrincipal(classForExibition, classForOcult1, classForOcult2, classForOcult3){
	var displayValue = document.getElementsByClassName(classForExibition);
	displayValue[0].style.display = "block";
	var displayValue = document.getElementsByClassName(classForOcult1);
	displayValue[0].style.display = "none";
	var displayValue = document.getElementsByClassName(classForOcult2);
	displayValue[0].style.display = "none";
	var displayValue = document.getElementsByClassName(classForOcult3);
	displayValue[0].style.display = "none";
}

function mudarEstadoAndOcultBtn(classForExibition, classBtn){
	var displayValue = document.getElementsByClassName(classForExibition);
	var displayValueBtn = document.getElementsByClassName(classBtn);
	if(displayValue[0].style.display = "none"){
		displayValue[0].style.display = "block";
		displayValueBtn[0].style.visibility = "hidden";
	}
	else if(displayValue[0].style.display = "block"){
		displayValue[0].style.display = "none";
	}
}

function mudarEstadoAndExibeBtn(classForExibition, classBtn){
	var displayValue = document.getElementsByClassName(classForExibition);
	var displayValueBtn = document.getElementsByClassName(classBtn);
	if(displayValue[0].style.display = "block"){
		displayValue[0].style.display = "none";
		displayValueBtn[0].style.visibility = "visible";
	}
	else if(displayValue[0].style.display = "none"){
		displayValue[0].style.visibility = "visible";
	}
}

function mudarEstado(classForExibition){
	var displayValue = document.getElementsByClassName(classForExibition);
	if(displayValue[0].style.visibility = "hidden"){
		displayValue[0].style.visibility = "visible";
	}
	else{
		displayValue[0].style.visibility = "hidden";
	}
}