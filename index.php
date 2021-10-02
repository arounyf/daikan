<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
		<title>LIANG23 账号提交</title>
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body onmouseover="ifphone()">
		<?php include "nav.php";?>
	<script type="text/javascript">
		function ifphone(){
			var uservalue = document.getElementById("user").value.length;
			if (uservalue == "11"){
				document.getElementById("school").placeholder = "无需填写";
				document.getElementById("school").disabled = "disabled";
				document.getElementById("school").value = "";
			}else{
				document.getElementById("school").placeholder = "请输入学校";
				document.getElementById("school").disabled = "";
			}
		}
	</script>
	<div class="container">
		<!-- 表单区域 -->
		<form action="insert.php" method="post">
		<br>
         <label for="school">基本信息：</label>
		   <div class="form-group">
		  <select class="form-control" id="exampleFormControlSelect1" name="type">
		      	<option value="null">请选择类型</option>
		      	<option value="cx">超星/学习通</option>
		        <option value="zhs">智慧树/知到</option>
		        <option value="null">其他平台请备注</option>
		      </select>
		    </div>

		  <div class="form-group">
		<!--     <label for="user">账号密码</label> -->
		    <input type="text" name="user" class="form-control" id="user"  placeholder="请输入账号" required onblur="ifphone()">
		  </div>

		  <div class="form-group">
		    <input type="text" name="password"  class="form-control" id="text2" placeholder="请输入密码" required>
		  </div>
            <div class="form-group">

		    <input type="text" name="school" class="form-control" id="school"  placeholder="请输入学校" required>
		     </div>
		 

			<div class="form-group">
		    <label for="course">课程名</label>
		    <input type="text" name="course"  class="form-control" id="text2" placeholder="多门使用中文逗号隔开" required>
		  </div>

			<div class="form-group">
		    <select class="form-control" id="exampleFormControlSelect1" name="task">
		        <option value="1">视频+考试</option>
		        <option value="2">视频</option>
		        <option value="3">考试</option>
		      </select>
		  </div>

		  <div class="form-group">
		    <label for="beizhu">备注</label>
		    <input type="text" name="beizhu" class="form-control" id="text1"  placeholder="可选">
		  </div>


		  <button type="submit" class="btn right btn-primary">提交</button>
		</form>
		
		
	</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
 
<!-- bootstrap.bundle.min.js 用于弹窗、提示、下拉菜单，包含了 popper.min.js -->
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
 
<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
