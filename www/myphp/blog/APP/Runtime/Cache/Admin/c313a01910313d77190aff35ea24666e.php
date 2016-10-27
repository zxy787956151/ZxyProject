<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="<?php echo U(GROUP_NAME . '/System/updateVerify');?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">验证码设置</th>
			</tr>
			<tr>
				<td align="right">验证码长度: </td>
				<td>
					<input type="text" name="VERIFY_LENGTH" value='<?php echo (C("verify_length")); ?>' />
				</td>
			</tr>
			<tr>
				<td align="right">验证码宽度</td>
				<td>
					<input type="text" name="VERIFY_WIDTH" value='<?php echo (C("VERIFY_WIDTH")); ?>' />
				</td>
			</tr>
			<tr>
				<td align="right">验证码图片高度</td>
				<td>
					<input type="text" name="VERIFY_HEIGHT" value='<?php echo (C("VERIFY_HEIGHT")); ?>'/>
				</td>
			</tr>
			<tr>
				<td align="right">验证码背景颜色(16进制色值)</td>
				<td>
					<input type="text" name="VERIFY_BGCOLOR" value='<?php echo (C("VERIFY_BGCOLOR")); ?>' />
				</td>
			</tr>
			<tr>
				<td align="right">验证码种子</td>
				<td>
					<input type="text" name="VERIFY_SEED" value='<?php echo (C("VERIFY_SEED")); ?>' />
				</td>
			</tr>
			<tr>
				<td align="right">验证码字体文件</td>
				<td>
					<input type="text" name="VERIFY_FONTFILE" value='<?php echo (C("VERIFY_FONTFILE")); ?>'/>
				</td>
			</tr>
			<tr>
				<td align="right">验证码字体大小</td>
				<td>
					<input type="text" name="VERIFY_SIZE" value='<?php echo (C("VERIFY_SIZE")); ?>'/>
				</td>
			</tr>
			<tr>
				<td align="right">验证码字体颜色</td>
				<td>
					<input type="text" name="VERIFY_COLOR" value='<?php echo (C("VERIFY_COLOR")); ?>'/>
				</td>
			</tr>		
			<tr>
				<td align="right">SESSION识别名称</td>
				<td>
					<input type="text" name="VERIFY_NAME" value="<?php echo (C("VERIFY_NAME")); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">存储验证码到SESSION时使用函数</td>
				<td>
					<input type="text" name="VERIFY_FUNC" value='<?php echo (C("VERIFY_FUNC")); ?>'/>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="保存修改" />
				</td>
			</tr>
		</table>
	</form>

		<!-- //验证码长度
		'VERIFY_LENGTH' => 4,
		//验证码图片宽度(像素)
		'VERIFY_WIDTH' => 250,
		//验证码图片高度(像素)
		'VERIFY_HEIGHT' => 60,
		//验证码背影颜色(16进制色值)
		'VERIFY_BGCOLOR' => '#F3FBFE',
		//验证码种子
		'VERIFY_SEED' => '3456789aAbBcCdDeEfFgGhHjJkKmMnNpPqQrRsStTuUvVwWxXyY',
		//验证码字体文件
		'VERIFY_FONTFILE' => './Data/font.ttf',
		//验证码字体大小
		'VERIFY_SIZE' => 30,
		//验证码字体颜色(16进制色值)
		'VERIFY_COLOR' => '#444444',
		//SESSION识别名称
		'VERIFY_NAME' => 'verify',
		//存储验证码到SESSION时使用函数
		'VERIFY_FUNC' => 'strtolower', -->
</body>
</html>