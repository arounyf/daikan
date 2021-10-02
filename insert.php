<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<title>验证码</title>
</head>
<body>
	<?php include "nav.php";?>
	<div class="container">
		<br>
			<strong>
		  	<?php
		  	require "./config/main.php";
		  	require "./config/db.php";
		  	require "./config/api.php";
		  	
		  	//生成验证码
            function MakePass($length){
                $possible = "0123456789".
                "abcdefghijklmnopqrstuvwxyz".
                "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $str = "";
                while(strlen($str) < $length){
                    $str .= substr($possible, (rand() % strlen($possible)), 1);
                }
                return($str);
            }
           
		  	//接收数据
			$school = $_POST['school'];
			$type = $_POST['type'];
			$user = $_POST['user'];
			$password = $_POST['password'];
			$course = $_POST['course'];
			$task = $_POST['task'];
			$rand = MakePass(6);
			$beizhu = $_POST['beizhu'];
			$showtime=date("Y-m-d H:i:s");
            

			// 防止用户刷新修改验证码
			$sql2 = "select rand,time from $dbtable where type = '$type' and user = '$user'";
			$result2 = $db -> query($sql2);
			$crand = "";
			while($row=$result2->fetch_object()){
						$crand =  $row->rand;
						$time2 =  $row->time;
					}
			//判断数据是否已经存在
			if ($crand) {
			    //判断更新语句是否执行成功
			    function liang23($db,$ttype){
    			    if($db && mysqli_affected_rows($db) == 1 ){
    			        echo '<div class="alert alert-warning text-danger"><strong>';
    					echo $ttype;
    					echo '</strong></div>';
                        return $ttype."\n";
    			    }
			    }
			    

				$sql3 = "update $dbtable set password = '$password' where rand ='$crand'";
				$db -> query($sql3);
				$c1 = liang23($db,$ttype="密码修改成功");
				$sql4 = "update $dbtable set beizhu = '$beizhu' where rand ='$crand'";
				$db -> query($sql4);
				$c2 = liang23($db,$ttype="备注修改成功");
				$sql5 = "update $dbtable set  course ='$course' where rand ='$crand'";
				$db -> query($sql5);
				$c3 = liang23($db,$ttype="课程修改成功");
				$sql6 = "update $dbtable set  task = '$task' where rand ='$crand'";
				$db -> query($sql6);
				$c4 = liang23($db,$ttype="任务修改成功");

				//发送通知
				if ($c1 || $c2 || $c3 || $c4){
				    //发送通知
				    $url = $select_url.'?rand='.$crand;
    				$desp = "检测到有用户修改账号信息\n验证码：$crand\n账号：$user\n$c1$c2$c3$c4$showtime<a href=\"$url\">点击查看</a>";
    				sct_send($desp);
				}
				
				echo '<div class="alert alert-warning text-danger"><strong>';
				echo $crand;
				echo '</strong></div>';
				echo '<div class="alert alert-success text-success"><strong>';
				echo $time2;
				echo '</strong></div>';
				
			}else{
				// 插入语句
				$sql = "insert into $dbtable value('$rand',now(),'$school','$type','$user','$password','$course','$task','$beizhu')";
				$execute_result = $db -> query($sql);
				echo '<div class="alert alert-warning text-danger"><strong>';
				echo $rand;
				echo '</strong></div>';
				echo '<div class="alert alert-success text-success"><strong>';
				echo $showtime;
				echo '</strong></div>';
                

				//发送通知
			    $url = $select_url.'?rand='.$rand;
				$desp = "检测到有用户提交账号信息\n验证码：$rand\n账号：$user\n$showtime<a href=\"$url\">点击查看</a>";
				sct_send($desp);
				
			}

			//显示数据
			if ($type == 'cx'){$type = "超星";}elseif ($type == "zhs"){$type = "智慧树";}else{$type = "未填写";}
			if ($task == '1'){$task = "视频+考试";}elseif ($task == 2) {$task = "视频";}else{$task = "考试";}
			echo '<div class="alert alert-primary text-success"><strong>';
			echo "请截图保存";
			echo '</strong></div>';
			echo '<div class="alert alert-primary" role="alert">';
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
			echo "如果信息有误,可重新填写";
			echo "<br>";
			echo $beizhu;
			?>
		  	</strong>
	
	</div>
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
 
<!-- bootstrap.bundle.min.js 用于弹窗、提示、下拉菜单，包含了 popper.min.js -->
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
 
<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

