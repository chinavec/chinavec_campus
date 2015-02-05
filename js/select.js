<script type="text/javascript">
	 $(function () { 
		$("#selectAll").click(function () {//全选  
			$("#playList :checkbox").prop("checked", true);  
		});  
		$("#unSelect").click(function () {//全不选  
			$("#playList :checkbox").prop("checked", false);  
		});  
	}); 
</script>