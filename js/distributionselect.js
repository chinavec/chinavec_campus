//2013年5月
//云媒体平台媒体分发管理1.0版
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
			//返回cDhanddistr.php
			window.location.href="cDhanddistr.php";
		});
	});
	
	