<?php
	header("Content-Type:text/html;charset=utf-8");
	include("conn.php");

	if(@$_POST['submit']){
		$sql="insert into xiaowei(id,user,title,content,lastdate) 
		values ('','$_POST[user]','$_POST[title]','$_POST[content]',now())";
		mysql_query($sql);
		echo "<script>
					alert('发表成功');
					location.href='list.php';
			  </script>";

	//echo $sql;
	}
?>
	<script type="text/javascript">
		function CheckPost(){
			if(myform.user.value==""){
				alert("用户名不能为空");
				myform.user.focus();
				return false;
			}
			if(myform.title.value.length<5){
				alert("标题过短");
				myform.title.focus();
				return false;
			}
			if(myform.content.value==""){
				alert("内容不能为空");
				myform.content.focus();
				return false;

			}
		}
	</script>
	<form action="add.php" method="post" name="myform" onsubmit="return CheckPost()">
	用户：<input type="text" size="10" name="user" ><br>
	标题：<input type="text" name="title" ><br>
	内容：<textarea name="content" cols="60" rows="9" ></textarea><br>
		  <input type="submit" name="submit" value="发布留言"><br>
	</form>