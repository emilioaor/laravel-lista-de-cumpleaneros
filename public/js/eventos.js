function ready(){

	$("#search").on("keydown",function(event){
		if(event.keyCode == 13 ) searchEmployee();
	});
}

function goToMonth(month){
	var leftActual = $('#employees').scrollLeft();
	var leftDestino = $(".m"+month).position().left;
	var l = leftActual + leftDestino;

	$('#employees').animate({
	    scrollLeft: l -200
	}, 1000);
}

function goToAdminEmployee(id){

	$('body').animate({
		scrollTop : $("#row"+id).position().top
	},500);
}

function goToEmployee(id){

	cerrarResult();

	var leftActual = $('#employees').scrollLeft();
	var leftDestino = $("#row"+id).position().left;
	var l = leftActual + leftDestino;

	$('#employees').animate({
		scrollLeft : (l - $(window).width() / 2) +180
	},500);
}

function searchEmployee(){
	var s = $("#search").val();
	$.ajax({
		'type' 	: 'get',
		'url'	: 'search/'+s,
		success	: function(data){
			$("#spaceResult").show();
			$("#spaceResult").html(data);
		}
	});
}

function cerrarResult(){
	$("#spaceResult").html('');
	$("#spaceResult").hide();
	$("#search").val('');
}
