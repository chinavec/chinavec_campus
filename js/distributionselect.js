//2013��5��
//��ý��ƽ̨ý��ַ�����1.0��
//��ʱ�ַ�ɸѡ����
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
			//����cDhanddistr.php
			window.location.href="cDhanddistr.php";
		});
	});
	
	