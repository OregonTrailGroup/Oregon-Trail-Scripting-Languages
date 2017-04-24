$(document).ready(function(){

	// main menu options
	$(".btngrp_main").click(function(){
		var val = $(this).text();

		switch(val) {
		case "1.":
			//travel the trail
			break;
		case "2.":
			//info about the trail
			break;
		case "3.":
			//see top 10
			break;
		case "4.":
			//management options
			break;
		default:
			alert("NONE");
			break;
		}

	});

	// options
	$(".btngrp_options").click(function(){
		var val = $(this).text();
		var base_path = "/~eburch2/"

		switch(val) {
		case "1.":
			//current top ten
			alert("See current top ten list");
			break;
		case "2.":
			//original top ten
			alert("see original top ten list");
			break;
		case "3.":
			//back to main
			alert("Return to main");
			$("form").action("index.php");
			break;
		default:
			alert("NONE");
			break;
		}
	});

});

function isEnter(event) {
	var ENTER_CODE = 13;
	if (event.keyCode == ENTER_CODE) {
		return true;
	}
}