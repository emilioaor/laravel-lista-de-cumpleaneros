function ready(){

	$("#search").on("keydown",function(event){
		if(event.keyCode == 13 ) searchEmployee();
	});

	$(".employeeAlert").animate({
		bottom : "50px"
	},2000);

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

function imageF(img){

	if(img == 'images/logo.jg')
		var i = img;
	else
		var i = 'imagesEmployees/'+img;
	
	$(".imageFull").show();	
	$("#imageFull").attr("src",i);

	$(".imageFull").animate({
		opacity : "1",
	},500);
}

function imageClose(){

	$("#imageFull").attr("src",'');
	$(".imageFull").hide();
	$(".imageFull").css("opacity","0");
}

function employeeAlertClose(){

	$(".employeeAlert").hide();
}
