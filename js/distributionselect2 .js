//2013��5��
//ý��ַ�����
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
			//����cDhandtimedistr.php
			window.location.href="cDhandtimedistr.php";
		});
	});
	
	
	