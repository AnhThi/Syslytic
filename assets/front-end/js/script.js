$(document).ready(function(){

	$("#nav_sub").hide();

    $("#btn_product").click(function(){
        $("#nav_sub").fadeToggle( 500, "swing" );
    });
}); 