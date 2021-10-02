<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<title>查询</title>
</head>
<body>
	<?php include "nav.php";?>
	<div class="container">
		<br>
		<?php 
			require "./config/main.php";
		  	require "./config/db.php";
			
			$rand = $_GET['rand'];
			//查询数据
			$sql = "select school,time,type,user,password,course,task,beizhu from $dbtable where rand = '$rand'";
			$result = $db -> query($sql);

			$school =  "";$type =  "";$user =  "";$password = "";$course =  "";$task =  "";$time =  "";
			while($row=$result->fetch_object()){
				$school =  $row->school;
				$type =  $row->type;
				$user =  $row->user;
				$password = $row->password;
				$course =  $row->course;
				$task =  $row->task;
				$time =  $row->time;
				$beizhu =  $row->beizhu;
			}

			//显示数据
			echo '<ul class="list-group"><li class="list-group-item active">';
			echo "信息查询";
			echo '</li><li class="list-group-item">';
			if ($type == 'cx'){$type = "超星";}elseif ($type == "zhs"){$type = "智慧树";}else{$type = "未填写";}
			if ($task == '1'){$task = "视频+考试";}elseif ($task == 2) {$task = "视频";}else{$task = "考试";}
			if ($user){
			    echo $rand;
				echo "<br>";
				echo $type;
				echo "<br>";
				echo '<strong class="text-danger">';
				echo $school." ";
				echo $user." ";
				echo $password;
				echo "<br>";
				echo '</strong>';
				echo $course;
				echo "<br>";
				echo $task;
				echo "<br>";
				echo $time;
				
				echo "<br>".$beizhu;
			}else{
				echo "未找到记录";
			}

		?>	
		   
	  </div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
 
<!-- bootstrap.bundle.min.js 用于弹窗、提示、下拉菜单，包含了 popper.min.js -->
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
 
<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>