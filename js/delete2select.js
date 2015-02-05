 $(document).ready(function(){
		$("#btn").click(function(){
			$("input[name='distr[]']").each(function(){
				 //alert($(this).attr("checked"));
				 if($(this).prop("checked") != true){
				 $(this).closest('.distr').remove();
				 }
			});
		});
		
		$("#allbtn").click(function(){
			//返回cDhandtimedele.php
			window.location.href="cDhandtimedele.php";
		});
	});
	