<?php
	include("base.php");
	$del=@$_GET['id'];
	$del2=@$_GET['img_id'];
	if(!($pdo -> exec("use bk;delete from mytext where id=$del;"))){
		
		if(!($pdo -> exec("use bk;delete from img where id=$del2;"))){
			echo "<script type='text/javascript'>
				alert('删除成功!点击返回');location.href='index.php';
			</script>";
		}
		
	}
?>
