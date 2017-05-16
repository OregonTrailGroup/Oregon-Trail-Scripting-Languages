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

	// info
	$("#btn_info_continue").click(function(){
		// hides our current p tag then shows the next
		var ele = "#p_info" + currentPTag;
		$(ele).toggle();
		currentPTag = currentPTag + 1;
		var ele = "#p_info" + currentPTag;
		$(ele).toggle();

		if (currentPTag >= 6) {
			$("#btn_info_continue").toggle();
			$("#btn_info_return").toggle();
		}
	});

	// hiscores
	$("#btn_points").click(function(){
		$("#div_hiscores").toggle();
		$("#div_hidden").toggle();
	});

	$("#btn_hiscores_continue").click(function(){
		// hides our current p tag then shows the next
		var ele = "#p_info" + currentPTag;
		$(ele).toggle();
		currentPTag = currentPTag + 1;
		var ele = "#p_info" + currentPTag;
		$(ele).toggle();

		if (currentPTag >= 3) {
			$("#btn_info_continue").toggle();
			$("#btn_info_return").toggle();
		}
	});

});

// default to 1
var currentPTag = 1;

function init_count(curElement) {
	currentPTag = curElement;
}

function isEnter(event) {
	var ENTER_CODE = 13;
	if (event.keyCode == ENTER_CODE) {
		return true;
	}
}

function toggleDivs(toShow, toHide) {
	
	var eleToShow = document.getElementById(toShow);
	var eleToHide = document.getElementById(toHide);
	eleToShow.style.display = "block";
	eleToHide.style.display = "none";
}