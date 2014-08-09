// start code only once the page is loaded
$(document).ready(function () 
{
	// bootstrap code for login div
		$('#register').click(function(event) 
		{
			$(".logreg").toggleClass("back");
			$(".form-title").html("Register");
		}); 
	
	// open bootstrap login onclick (click on login on menu)
		$("#login").click(function() 
		{
			$("#wrw").css({"zIndex":"1500"});
			$("#wrw").animate({"opacity":"0.9"}, 500);
			$(".panel-default").animate({"opacity":"0.9"}, 500);
		});
	// close bootstrap login onclick (click on black wraper screen)
		$("#wrw").click(function() 
		{
			$("#wrw").animate({"zIndex":"-1"},500);
			$("#wrw").animate({"opacity":"0"}, 500);
			$(".panel-default").animate({"opacity":"0"}, 500,function() 
			{
				$(".logreg").toggleClass("back");
				$(".form-title").html("Sign In");
			});
		});
});