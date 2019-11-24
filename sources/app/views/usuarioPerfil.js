function mudarCorButtonsMenu(classOfButtons, numButtom){
	var colorValue = document.getElementsByClassName(classOfButtons);
	for (var i = 0; i < colorValue.length; i++) {
		if(i == numButtom){
			colorValue[i].style.color = "red";
		}
		else{
			colorValue[i].style.color = "rgb(0, 77, 192)";
		}
	}
}
function exibirMenuPrincipal(classForExibition, classForOcult1){
	var displayValue = document.getElementsByClassName(classForExibition);
	displayValue[0].style.display = "block";
	var displayValue = document.getElementsByClassName(classForOcult1);
	displayValue[0].style.display = "none";
}