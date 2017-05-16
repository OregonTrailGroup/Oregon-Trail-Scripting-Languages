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

	$("input[id='btn_start']").click(function(){
		/*
		var radios = document.getElementsByClassName("radio_start");
		var valid_radio = null;
		var NUM_PARTY_MEMBERS = 5;
		for (i = 0; i < radios.length && valid_radio == null; i++) { 
    		if (radios[i].checked == true) {
    			valid_radio = radios[i];
    		}
		}
		alert(valid_ratio);
		var names_arr = [];
		for (i = 0; i < NUM_PARTY_MEMBERS; i++) {
			var ele = "txtbox_" + i;
			var name = document.getElementById(ele).value;
			names_arr.push(name);
		}
		console.log("1: " + valid_radio);
		alert("test");
		console.log("2: " + names_arr);
		*/
		var job_val = $("input[type='radio']:checked").val();
		var name1_val = $("input[name='party_mem_1']").val();
		var name2_val = $("input[name='party_mem_2']").val();
		var name3_val = $("input[name='party_mem_3']").val();
		var name4_val = $("input[name='party_mem_4']").val();
		var name5_val = $("input[name='party_mem_5']").val();
		$.post("setvars.php", { job: job_val, name1: name1_val, name2: name2_val, name3: name3_val, name4: name4_val, name5: name5_val }, function(data) {
			sleep(5);
		});

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

function loadFile(path, selector) {
	//snippet inspired by http://stackoverflow.com/questions/6470567/jquery-load-txt-file-and-insert-into-div
	$(document).ready(function() {
		$.ajax({
            url : path,
            dataType: "text",
            success : function (data) {
                $(selector).html(data);
            }
        });
	});
}

function toggleDivs(toShow, toHide) {
	
	var eleToShow = document.getElementById(toShow);
	var eleToHide = document.getElementById(toHide);
	eleToShow.style.display = "block";
	eleToHide.style.display = "none";
}