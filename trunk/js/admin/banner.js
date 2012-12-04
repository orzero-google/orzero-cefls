	var tt = nn = 0, countt;
	$(document).ready(function(){	
		countt=$("#topsbanner_list a").length;
		$("#topsbanner_list a:not(:first-child)").hide();
		$("#topsbanner_info").html($("#topsbanner_list a:first-child").find("img").attr('alt'));
		$("#topsbanner_info").click(function(){window.open($("#topsbanner_list a:first-child").attr('href'), "_blank")});
		$("#topssubbanner li").click(function() {
			var ii = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4
			nn = ii;
			if (ii >= countt) return;
			$("#topsbanner_info").html($("#banner_list a").eq(ii).find("img").attr('alt'));
			$("#topsbanner_info").unbind().click(function(){window.open($("#topsbanner_list a").eq(ii).attr('href'), "_blank")})
			$("#topsbanner_list a").filter(":visible").fadeOut('slow').parent().children().eq(ii).fadeIn('slow');
			document.getElementById("topssubbanner").style.background="";
			$(this).toggleClass("on");
			$(this).siblings().removeAttr("class");
		});
		tt = setInterval("showAutoo()", 8000);
		$("#topssubbanner").hover(function(){clearInterval(tt)}, function(){tt = setInterval("showAutoo()", 4000);});
	})
	
	function showAutoo()
	{
		nn = nn >=(countt - 1) ? 0 : ++nn;
		$("#topssubbanner li").eq(nn).trigger('click');
	}