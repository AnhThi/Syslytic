$("#nav_subProducts").hide();
$("#nav_subCompany").hide();
$("#nav_subSupport").hide();

$("#mnu_products").click(function(){
	$("#nav_subProducts").toggle(400);
	$("#nav_subCompany").hide();
	$("#nav_subSupport").hide();
});

$("#mnu_company").click(function(){
	$("#nav_subProducts").hide();
	$("#nav_subCompany").toggle(400);
	$("#nav_subSupport").hide();
});

$("#mnu_support").click(function(){
	$("#nav_subProducts").hide();
	$("#nav_subCompany").hide();
	$("#nav_subSupport").toggle(400);
});
