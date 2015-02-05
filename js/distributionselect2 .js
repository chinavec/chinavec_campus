//2013年5月
//媒体分发管理
//即时分发筛选操作
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
			//返回cDhandtimedistr.php
			window.location.href="cDhandtimedistr.php";
		});
	});
	
	
	