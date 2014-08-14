// start code only once the page is loaded
var forgot = false;
$(document).ready(function () 
{
	var swiched = false;
	var onlogin = false;
	var onindex = false;
	// bootstrap code for login div
		$('.register').click(function(event) 
		{ 
			if (!onlogin)
			{
				$("#login").click();
				onlogin=false;
			}
			$(".logreg").toggleClass("back");
			$(".form-title").html("Register");
			
			swiched=true;
		}); 
	
	// open bootstrap login onclick (click on login on menu)
		$("#login").click(function() 
		{
			onlogin = true;
			$("#wrw").css({"zIndex":"1500"});
			$(".panel").css({"zIndex":"1501"});
			$("#wrw").animate({"opacity":"0.9"}, 500);
			$(".panel-default").animate({"opacity":"0.9"}, 500);
			
		});
	// close bootstrap login onclick (click on black wraper screen)
		$("#wrw").click(function() 
		{
			onlogin = false;
			$("#wrw").animate({"opacity":"0"}, 500);
			$(".panel-default").animate({"opacity":"0"}, 500,function() 
			{
				if (swiched)
				{
					$(".logreg").removeClass("back");
					$("#reg").toggleClass("back");
					$(".form-title").html("Sign In");
					$(".forgot").css({"visibility":"hidden"});
					swiched = false;
				}
				$(".panel").css({"zIndex":"-1"});
				$("#wrw").css({"zIndex":"-1"});
			});
		});
		$("#forgot").click(function() 
		{
			swiched = true;
			$(".form-title").html("Reset password");
			$(".logreg").removeClass("back");
			$(".logreg").toggleClass("back");
			$(".forgot").css({"visibility":"visible"});
		});
		
		$("#changepass").click(function() 
		{
			onlogin = true;
			$(".form-title").html("Change Password");
			$("#wrw").css({"zIndex":"1500"});
			$(".panel").css({"zIndex":"1501"});
			$("#wrw").animate({"opacity":"0.9"}, 500);
			$(".panel-default").animate({"opacity":"0.9"}, 500);
			
		});
		$("#changepic").click(function() 
		{
			onlogin = true;
			swiched = true;
			$(".form-title").html("Change Picture");
			$(".logreg").toggleClass("back");
			$(".forgot").css({"visibility":"visible"});
			$("#wrw").css({"zIndex":"1500"});
			$(".panel").css({"zIndex":"1501"});
			$("#wrw").animate({"opacity":"0.9"}, 500);
			$(".panel-default").animate({"opacity":"0.9"}, 500);
		});
});