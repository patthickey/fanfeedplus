$(document).ready(function(){
    $('.has-extra-hidden-children').change(function(){
        if( $(this).val()==="Insert"){
            $(".is-extra-hidden-child").show()
        }else{
            $(".is-extra-hidden-child").hide()
        }
    });

    $('#in_set_test').change(function(){
        if( $(this).val()==="Other"){
            $("#other_test").show()
        }else{
            $("#other_test").hide()
        }
    });
    $("#other_test").keyup(function(ev){
    var othersOption = $('#in_set_test').find('option:selected');
    if(othersOption.val() == "Other")
    {
        ev.preventDefault();
        //change the selected drop down text
        $(othersOption).html($("#other_test").val()); 
    } 
	});
	$('#add_card').submit(function() {
	    var othersOption = $('#in_set_test').find('option:selected');
	    if(othersOption.val() == "Other")
	    {
	        // replace select value with text field value
	        othersOption.val($("#other_test").val());
	    }
	});

});

function all_overide() {

	if((parallel.value=="All")||(parallel.value=="all")||(parallel.value=="")) {
		parallel.value = "%%";
	}

	if((faction.value=="All")||(faction.value=="all")||(faction.value=="")) {
		faction.value = "%%";
	}

	if((in_set.value=="All")||(in_set.value=="all")||(in_set.value=="")) {
		in_set.value = "%%";
	}

	if((card_name.value=="All")||(card_name.value=="all")||(card_name.value=="")) {
		card_name.value = "%%";
	}

	if((color.value=="All")||(color.value=="all")||(color.value=="")) {
		color.value = "%%";
	}

	if((number_in_set.value=="All")||(number_in_set.value=="all")||(number_in_set.value=="")) {
		number_in_set.value = "%%";
	}

	if((rarity.value=="All")||(rarity.value=="all")||(rarity.value=="")) {
		rarity.value = "%%";
	}

	if((sold_out.value=="All")||(sold_out.value=="all")||(sold_out.value=="")) {
		sold_out.value = "%%";
	}

	if((series.value=="All")||(series.value=="all")||(series.value=="")) {
		series.value = "%%";
	}

	else {
		$.ajax({
		  type: 'POST',
		  url: 'display_selected.php',
		  data: {
		  	parallel:parallel.value, 
		  	faction:faction.value, 
		  	in_set:in_set.value, 
		  	card_name:card_name.value, 
		  	color:color.value,
		  	number_in_set:number_in_set.value,
		  	rarity:rarity.value,
		  	sold_out:sold_out.value,
		  	series:series.value
		  },
		})
	}
}

function validate_signup() {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		
		if (email_up.value=="") {
			document.getElementById("email_up").focus();
			document.getElementById("email_up").style.backgroundColor="#FF6666";
			return false;
		}		

		if (!(re.test(email_up.value))){
			return false;
		}
		
		if(password1.value=="") {
			document.getElementById("password1").focus();
			document.getElementById("password1").style.backgroundColor="#FF6666";
			return false;
		}

		if(password2.value=="") {
			document.getElementById("password2").focus();
			document.getElementById("password2").style.backgroundColor="#FF6666";
			return false;
		}

		if(password1.value!=password2.value) {
			alert("passwords do not match");
			return false;
		}

		if(app_screen_name.value=="") {
			document.getElementById("app_screen_name").focus();
			document.getElementById("app_screen_name").style.backgroundColor="#FF6666";
			return false;
		}
		else{
			$.ajax({
		  	type: 'POST',
		  	url: 'sign_up.php',
		  	data: {email_up:email_up.value, password1:password1.value, app_screen_name:app_screen_name.value},
		})
			return true;
		}
}

function validate_signin() {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		
		if (email_in.value=="") {
			document.getElementById("email_in").focus();
			document.getElementById("email_in").style.backgroundColor="#FF6666";
			return false;
		}		

		if (!(re.test(email_in.value))){
			return false;
		}
		
		if(password3.value=="") {
			document.getElementById("password3").focus();
			document.getElementById("password3").style.backgroundColor="#FF6666";
			return false;
		}

		else{
			$.ajax({
		  	type: 'POST',
		  	url: 'sign_in.php',
		  	data: {email_in:email_in.value, password3:password3.value},
		})
			return true;
		}
}

function validate_add_card() {
		
		if(parallel.value=="Blank") {
			document.getElementById("parallel").focus();
			document.getElementById("parallel").style.backgroundColor="#FF6666";
			return false;
		}

		if(faction.value=="Blank") {
			document.getElementById("faction").focus();
			document.getElementById("faction").style.backgroundColor="#FF6666";
			return false;
		}

		if(in_set.value=="Blank") {
			document.getElementById("in_set").focus();
			document.getElementById("in_set").style.backgroundColor="#FF6666";
			return false;
		}		

		if(card_name.value=="") {
			document.getElementById("card_name").focus();
			document.getElementById("card_name").style.backgroundColor="#FF6666";
			return false;
		}

		if(color.value=="") {
			document.getElementById("color").focus();
			document.getElementById("color").style.backgroundColor="#FF6666";
			return false;
		}

		if(number_in_set.value=="") {
			document.getElementById("number_in_set").focus();
			document.getElementById("number_in_set").style.backgroundColor="#FF6666";
			return false;
		}

		if(rarity.value=="") {
			document.getElementById("rarity").focus();
			document.getElementById("rarity").style.backgroundColor="#FF6666";
			return false;
		}

		if(sold_out.value=="Blank") {
			document.getElementById("sold_out").focus();
			document.getElementById("sold_out").style.backgroundColor="#FF6666";
			return false;
		}	

		if(series.value=="Blank") {
			document.getElementById("series").focus();
			document.getElementById("series").style.backgroundColor="#FF6666";
			return false;
		}

		else{
			$.ajax({
		  	type: 'POST',
		  	url: 'add_card.php',
		  	data: {parallel:parallel.value, faction:faction.value, in_set:in_set.value, card_name:card_name.value, color:color.value, number_in_set:number_in_set.value, rarity:rarity.value, sold_out:sold_out.value, series:series.value},
		})
			return true;
		}
}


