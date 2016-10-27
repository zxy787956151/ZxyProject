<?php
	include("base.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Free CSS template by ChocoTemplates.com</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">SpringTime</a></h1>
			<div id="top-navigation">
				Welcome <a href="#"><strong>Administrator</strong></a>
				<span>|</span>
				<a href="#">Help</a>
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>
				<a href="#">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="index.php" ><span>文章</span></a></li>
			    <li><a href="#"class="active"><span>滚动轮播</span></a></li>
			    <li><a href="djph.php"><span>点击排行</span></a></li>
			    <li><a href="zxwz.php"><span>最新文章</span></a></li>
			    <li><a href="zztj.php"><span>站长推荐</span></a></li>
			    <li><a href="#"><span>Services Control</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			Current Articles
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Add New Move</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="" method="post">
						
						<!-- Form -->
						<div class="form">
              <p class="inline-field">

              	<label>滚动图片1</label>
								<input type="file" name="img1" class="field size5">
								
								<label>title</label>
								<input type="text" name="title1" class="field size3">
								<label>图片描述</label>
								<input type="text" name="miaoshu1" class="field size3"><br /><br />

								<label>滚动图片2</label>
								<input type="file" name="img2" class="field size5">
								
								<label>title</label>
								<input type="text" name="title2" class="field size3">
								<label>图片描述</label>
								<input type="text" name="miaoshu2" class="field size3"><br /><br />

								<label>滚动图片3</label>
								<input type="file" name="img3" class="field size5">
								
								<label>title</label>
								<input type="text" name="title3" class="field size3">
								<label>图片描述</label>
								<input type="text" name="miaoshu3" class="field size3"><br /><br />

								<label>滚动图片4</label>
								<input type="file" name="img4" class="field size5">
								
								<label>title</label>
								<input type="text" name="title4" class="field size3">
								<label>图片描述</label>
								<input type="text" name="miaoshu4" class="field size3"><br /><br />

								<input class="button" type="submit" name="sub" value="submit">
              </p>
						</div>
						<!-- End Form -->
						
						
					</form>
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<a href="#" class="add-button"><span>Add new Article</span></a>
						<div class="cl">&nbsp;</div>
						
						<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>
						<p><a href="#">Delete Selected</a></p>
						
						<!-- Sort -->
						<div class="sort">
							<label>Sort by</label>
							<select class="field">
								<option value="">Title</option>
							</select>
							<select class="field">
								<option value="">Date</option>
							</select>
							<select class="field">
								<option value="">Author</option>
							</select>
						</div>
						<!-- End Sort -->
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2010 - CompanyName</span>
		<span class="right">
			Design by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>

<?php
// var_dump(@$_POST['title1']);//null
// $pd1='-1';$pd2='-1';$pd3='-1';$pd4='-1';
	if (@$_POST['sub']=='submit') {
		if (@$_POST['title1']!=="") {
			$img1=@$_POST['img1'];
			$title1=@$_POST['title1'];
			$miaoshu1=@$_POST['miaoshu1'];
			$pdo -> exec("delete from move where in_id='1';
				insert into move(img,title,miaoshu,in_id)values('$img1','$title1','$miaoshu1','1')");
		}
		if (@$_POST['title2']!=="") {
			$img2=@$_POST['img2'];
			$title2=@$_POST['title2'];
			$miaoshu2=@$_POST['miaoshu2'];
			$pdo -> exec("delete from move where in_id='2';
				insert into move(img,title,miaoshu,in_id)values('$img2','$title2','$miaoshu2','2')");
		}
		if (@$_POST['title3']!=="") {
			$img3=@$_POST['img3'];
			$title3=@$_POST['title3'];
			$miaoshu3=@$_POST['miaoshu3'];
			$pdo -> exec("delete from move where in_id='3';
				insert into move(img,title,miaoshu,in_id)values('$img3','$title3','$miaoshu3','3')");
		}
		if (@$_POST['title4']!=="") {
			$img4=@$_POST['img4'];
			$title4=@$_POST['title4'];
			$miaoshu4=@$_POST['miaoshu4'];
			$pdo -> exec("delete from move where in_id='4';
				insert into move(img,title,miaoshu,in_id)values('$img4','$title4','$miaoshu4','4')");
		}
		// var_dump($title1);
		// var_dump($title2);
		// var_dump($title3);
		// var_dump($title4);
		header('Location:header1.php');
	}
?>

