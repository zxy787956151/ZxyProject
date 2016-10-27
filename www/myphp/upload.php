<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="userfile" />
		<input type="submit" name="sub2" value="上传"/>
	</form>
</body>
</html>
<?php 
	// var_dump($_POST);
	// var_dump(@$_FILES['userfile']['tmp_name']);
	var_dump(is_uploaded_file(@$_FILES['userfile']['name']));
 ?>