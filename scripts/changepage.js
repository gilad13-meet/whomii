$(document).ready(function () 
{
	if ( typeof page == "undefined")
		{
				if(location.search=="")
				{
				var page = "pages/home.php";
				var button = $(this);
				$("#page").fadeTo(0, 0, function() {
				$("#page").load(page, function () 
				{
					$("#page").fadeTo(500, 1);;
				});
				});
				}
				
				else
				{
					var page = location.search.substring(6);
					var file = page.replace("pages/","");
					file = file.replace(".php","");
					$(".pages").removeClass("active");
					$("#" + file).toggleClass("active");
					var button = $(this);
					$("#page").fadeTo(0, 0, function() {
					$("#page").load(page,function () 
					{
					$("#page").fadeTo(500, 1);;
					});
					});
				}
		}
		function load(t)
		{
		$("#page").load($(t).attr('name'));
		}
		$(".pages").click(function() {
				var button = $(this);
				$(".pages").removeClass("active");
				button.toggleClass("active");
				$("#page").fadeTo(500, 0, function() {
				var name = "pages/" + $(button).attr('name') + ".php";
				$("#page").load(name,function () 
				{
					$("#page").fadeTo(500, 1);;
				});
				var page = name;
				var state = {
				  "canBeAnything": true
				};
				
				history.pushState(state, "new page", "index.php?page="+page);
				
				});
		});
});