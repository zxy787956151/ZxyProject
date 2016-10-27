<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta nama="description" content="网页描述" />
		<link rel="stylesheet" type="text/css" href="" />
		<style type="text/css"></style>
		<script type="text/javascript">
			// window.load = function(){ 
			// 	document.getElementsById('data1').value=''; 
			// }; 
		</script>
	</head>
	<body>
		<?php
			if (!empty($_POST)) {
				$num1=$_POST['data1'];
				$num2=$_POST['data2'];

				if (@$_POST['yunsuanfu']=="+") {
					$result=$num1+$num2;
				}
				if (@$_POST['yunsuanfu']=="-") {
					$result=$num1-$num2;
				}
				if (@$_POST['yunsuanfu']=="*") {
					$result=$num1*$num2;
				}
				if (@$_POST['yunsuanfu']=="/") {
					$result=$num1/$num2;
				}
				
			}
			else{
				$num1="";
				$num2="";
				$result="";
			}
		?>
		<!-- 当action为空字符串的时候，是提交到本页面 -->
		<form action="" method="post">
			<input type="text" id="emp" name="data1" value="<?php echo $num1 ?>" />
			<select name="yunsuanfu">
				<option value="+" selected="selected">+</option>
				<option value="-" <?php if (@$_POST['yunsuanfu']=='-') {
					echo "selected='selected'";
				} ?>>-</option>
				<option value="*" <?php if (@$_POST['yunsuanfu']=='*') {
					echo "selected='selected'";
				} ?>>*</option>
				<option value="/" <?php if (@$_POST['yunsuanfu']=='/') {
					echo "selected='selected'";
				} ?>>/</option>
			</select>

			<input type="text" name="data2" value="<?php echo $num2; ?>">
			<input type="submit" value="=">
			<input type="text" name="result" value="<?php echo $result; ?>">
		</form> 

	</body>
</html>