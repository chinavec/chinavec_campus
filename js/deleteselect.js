
	$(document).ready(function(){
		$("#btn").click(function(){
			$("input[name='distribution']").each(function(){
				 //alert($(this).attr("checked"));
				 if($(this).prop("checked") != true){
				 $(this).closest('.distr').remove();
				 }
			});
		});
		
		$("#allbtn").click(function(){
			//·µ»ØcDdetele.php
			window.location.href="cDdetele.php";
		});
	});
	