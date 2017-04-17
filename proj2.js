$(document).ready(function(){
	$("#submit_main_menu").hide();

	switch($("#input_option").text()) {
		case 1:
			//travel the trail
			break;
		case 2:
			//info about the trail
			break;
		case 3:
			//see top 10
			break;
		case 4:
			//disable sound
			break;
		case 5:
			//management options
			break;
		case 6:
			//end
			break;
		default
			break;
	}
}

function isEnter(event) {
	var ENTER_CODE = 13;
	if (event.keyCode == ENTER_CODE) {
		return true;
	}
}