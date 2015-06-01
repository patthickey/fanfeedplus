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

	if((parallel.value=="All")||(parallel.value=="all")) {
		parallel.value = "%%";
	}

	if((faction.value=="All")||(faction.value=="all")) {
		faction.value = "%%";
	}

	if((in_set.value=="All")||(in_set.value=="all")) {
		in_set.value = "%%";
	}

	if((card_name.value=="All")||(card_name.value=="all")) {
		card_name.value = "%%";
	}

	if((color.value=="All")||(color.value=="all")) {
		color.value = "%%";
	}

	if((number_in_set.value=="All")||(number_in_set.value=="all")) {
		number_in_set.value = "%%";
	}

	if((rarity.value=="All")||(rarity.value=="all")) {
		rarity.value = "%%";
	}

	if((sold_out.value=="All")||(sold_out.value=="all")) {
		sold_out.value = "%%";
	}

	if((series.value=="All")||(series.value=="all")) {
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