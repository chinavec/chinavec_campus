<div id="header">
	<img id="logo" width="960px" height="180px;" src="./img/vec_logo1.jpg" />
    <span id="now_time" class="right"></span>
</div>
<ul id="nav" class="nav nav-pills">
    <li>
        <a href="../../chinavec_admin/chinavec_manager/admin/user/">用户管理</a>
    </li>
    <!--<li>
        <a href="">授权管理</a>
    </li>-->
   
    <li class="active">
        <a href="index.php" style="color:#ffffff">门户管理</a>
    </li>
    <li>
        <a href="../../chinavec_cd/contentdistribution/cDhanddistr.php">媒体分发</a>
    </li>
    <li>
        <a href="../../chinavec_admin/chinavec_business/support/newuserActive.php">业务支持</a>
    </li>
   
</ul>

<script type="text/javascript">
	function formatTime(value){
		return value < 10 ? '0' + value : value;
	}
	function printCurrentTime(){
		var date = new Date();
		var week = ['星期天', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];
		var currentTime = '';
		currentTime += date.getFullYear() + '-';
		currentTime += formatTime(date.getMonth() + 1) + '-';
		currentTime += formatTime(date.getDate()) + ' ';
		currentTime += formatTime(date.getHours()) + ':';
		currentTime += formatTime(date.getMinutes()) + ':';
		currentTime += formatTime(date.getSeconds()) + '  ';
		currentTime += week[date.getDay()];
		$('#now_time').text(currentTime);
	}
	$(function(){
		/*$('#nav > li').hover(function(){
			$(this).find('ul.sub_nav').show();	
		}, function(){
			$(this).find('ul.sub_nav').hide();
		});*/
		$('.ctable tbody tr:odd td').css('backgroundColor', '#c6f0ff');
		
		setInterval(printCurrentTime, 500);
	});
</script>
</html>
