
// INPUT VALIDATON -----------------------------------

$(document).ready(function(){
    $('.has-extra-hidden-children').change(function(){
        if( $(this).val()==="Insert"){
            $(".is-extra-hidden-child").show()
        }else{
            $(".is-extra-hidden-child").hide()
        }
    });


    $('#in_set_add').change(function(){
        if( $(this).val()==="Other"){
            $("#other_add").show()
        }else{
            $("#other_add").hide()
        }
    });
    $("#other_add").keyup(function(ev){
    var othersOption = $('#in_set_add').find('option:selected');
    if(othersOption.val() == "Other")
    {
        ev.preventDefault();
        //change the selected drop down text
        $(othersOption).html($("#other_add").val()); 
    } 
	});
	
	$('#add_card').submit(function() {
	    var othersOption = $('#in_set_add').find('option:selected');
	    if(othersOption.val() == "Other")
	    {
	        // replace select value with text field value
	        othersOption.val($("#other_add").val());
	    }
	});
	


    $('#in_set').change(function(){
        if( $(this).val()==="Other"){
            $("#other").show()
        }else{
            $("#other").hide()
        }
    });
    $("#other").keyup(function(ev){
    var othersOption = $('#in_set').find('option:selected');
    if(othersOption.val() == "Other")
    {
        ev.preventDefault();
        //change the selected drop down text
        $(othersOption).html($("#other_add").val()); 
    } 
	});
	$('#display_selected').submit(function() {
	    var othersOption = $('#in_set').find('option:selected');
	    if(othersOption.val() == "Other")
	    {
	        // replace select value with text field value
	        othersOption.val($("#other").val());
	    }
	});	

});

/*
function all_override() {

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

	if((number_in_set.value=="All")||(number_in_set.value=="all")||(number_in_set.value=="")||(!isNaN(number_in_set.value))) {
		number_in_set.value = "%%";
	}

	if((rarity.value=="All")||(rarity.value=="all")||(rarity.value=="")||(!isNaN(rarity.value))) {
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
*/

function all_override_two() {

	if((other.value=="All")||(other.value=="all")||(other.value=="")) {
		other.value = "%%";
	}

	if((card_name.value=="All")||(card_name.value=="all")||(card_name.value=="")) {
		card_name.value = "%%";
	}

	if((color.value=="All")||(color.value=="all")||(color.value=="")) {
		color.value = "%%";
	}

	if((number_in_set.value=="All")||(number_in_set.value=="all")||(number_in_set.value=="")||(!isNaN(number_in_set.value))) {
		number_in_set.value = "%%";
	}

	if((rarity.value=="All")||(rarity.value=="all")||(rarity.value=="")||(!isNaN(rarity.value))) {
		rarity.value = "%%";
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
		  	series:series.value,
		  	order_selected:order_selected.value
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

		
		if(parallel_add.value=="Blank") {
			alert("forgot parallel");
			document.getElementById("parallel_add").focus();
			document.getElementById("parallel_add").style.backgroundColor="#FF6666";
			return false;
		}

		if(faction_add.value=="Blank") {
			alert("forgot faction");
			document.getElementById("faction_add").focus();
			document.getElementById("faction_add").style.backgroundColor="#FF6666";
			return false;
		}

		if((parallel_add.value=="Insert")&&(in_set_add.value=="Blank")) {
			alert("forgot set");
			document.getElementById("in_set_add").focus();
			document.getElementById("in_set_add").style.backgroundColor="#FF6666";
			return false;
		}		

		if((in_set_add.value=="Other")&&(other_add.value=="")) {
			alert("forgot set name");
			document.getElementById("other_add").focus();
			document.getElementById("other_add").style.backgroundColor="#FF6666";
			return false;
		}		

		if(card_name_add.value=="") {
			alert("forgot card name");
			document.getElementById("card_name_add").focus();
			document.getElementById("card_name_add").style.backgroundColor="#FF6666";
			return false;
		}

		if(color_add.value=="") {
			alert("forgot color");
			document.getElementById("color_add").focus();
			document.getElementById("color_add").style.backgroundColor="#FF6666";
			return false;
		}

		if((parallel_add.value=="Insert")&&(number_in_set_add.value=="")&&(!isNaN(number_in_set_add.value))) {
			alert("forgot number");
			document.getElementById("number_in_set_add").focus();
			document.getElementById("number_in_set_add").style.backgroundColor="#FF6666";
			return false;
		}

		if((rarity_add.value=="")&&(!isNaN(number_in_set_add.value))) {
			alert("forgot number");
			document.getElementById("rarity_add").focus();
			document.getElementById("rarity").style.backgroundColor="#FF6666";
			return false;
		}

		if(sold_out_add.value=="Blank") {
			alert("forgot sold out");
			document.getElementById("sold_out_add").focus();
			document.getElementById("sold_out_add").style.backgroundColor="#FF6666";
			return false;
		}	

		if(series_add.value=="Blank") {
			alert("forgot series");
			document.getElementById("series_add").focus();
			document.getElementById("series_add").style.backgroundColor="#FF6666";
			return false;
		}

		else{
		/*
			$.ajax({
		 	type: 'POST',
		  	url: 'add_card.php',
		  	data: {parallel_add:parallel_add.value, faction_add:faction_add.value, in_set_add:in_set_add.value, card_name_add:card_name_add.value, color_add:color_add.value, number_in_set_add:number_in_set_add.value, rarity_add:rarity_add.value, sold_out_add:sold_out_add.value, series_add:series_add.value},
		})
		*/
			return true;
		}
}

// END OF INPUT VALIDATON -----------------------------------

function textCounter(field, cnt, maxlimit) {         
var cntfield = document.getElementById(cnt) 
 if (field.value.length > maxlimit) // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
    // otherwise, update 'characters left' counter
    else
    cntfield.value = maxlimit - field.value.length;
 }









