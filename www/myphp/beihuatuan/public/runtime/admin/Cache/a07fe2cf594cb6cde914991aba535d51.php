<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo conf("APP_NAME");?> - <?php echo l("SYSTEM_LOGIN");?> </title>
<script type="text/javascript">
	//定义JS语言
	var ADM_NAME_EMPTY = '<?php echo l("ADM_NAME_EMPTY");?>';
	var ADM_PASSWORD_EMPTY = '<?php echo l("ADM_PASSWORD_EMPTY");?>';
	var ADM_VERIFY_EMPTY = '<?php echo l("ADM_VERIFY_EMPTY");?>';
	function resetwindow()
	{
		if(top.location != self.location)
		{
			top.location.href = self.location.href;
			return 
		}
	}
	resetwindow();
</script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/login.css" />
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/login.js"></script>
</head>
<body bgcolor="#ffffff" style=" background:url(__TMPL__Common/images/login/bg.gif); padding:110px 0px 0px 0px; margin:0px;">
<form action="/m.php?m=Public&a=do_login">
<table border="0" cellpadding="0" cellspacing="0" width="695" style="margin:0px auto;">
  <tr>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="28" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="300" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="71" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="103" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="6" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="5" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="45" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="2" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="135" height="1" border="0" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td colspan="9"><img name="login_r1_c1" src="__TMPL__Common/images/login/login_r1_c1.png" width="695" height="40" border="0" id="login_r1_c1" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="40" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="11"><img name="login_r2_c1" src="__TMPL__Common/images/login/login_r2_c1.png" width="28" height="229" border="0" id="login_r2_c1" alt="" /></td>
   <td rowspan="11"><img name="login_r2_c2" src="__TMPL__Common/images/login/login_r2_c2.png" width="300" height="229" border="0" id="logo" alt="" /></td>
   <td rowspan="11"><img name="login_r2_c3" src="__TMPL__Common/images/login/login_r2_c3.png" width="71" height="229" border="0" id="login_r2_c3" alt="" /></td>
   <td colspan="5" style="background:url(__TMPL__Common/images/login/login_r2_c4.png); width:161px; height:45px; font-size:14px;"><div id="login_msg"></div></td>
   <td rowspan="11"><img name="login_r2_c9" src="__TMPL__Common/images/login/login_r2_c9.png" width="135" height="229" border="0" id="login_r2_c9" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="45" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"  style="background:url(__TMPL__Common/images/login/login_r3_c4.png); width:161px; height:27px;"> 
   <input type="text" style="border:0px; width:150px; height:15px; padding:5px; font-size:12px; background:none;" name="adm_name" class="adm_name"  />
   </td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="27" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="login_r4_c4" src="__TMPL__Common/images/login/login_r4_c4.png" width="161" height="5" border="0" id="login_r4_c4" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="5" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5" style="background:url(__TMPL__Common/images/login/login_r5_c4.png); width:161px; height:27px;">
   <input type="password" style="border:0px; width:150px; height:15px; padding:5px; font-size:12px; background:none;" name="adm_password" class="adm_password"  />
   </td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="27" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="login_r6_c4" src="__TMPL__Common/images/login/login_r6_c4.png" width="161" height="5" border="0" id="login_r6_c4" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="5" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="3" style="background:url(__TMPL__Common/images/login/login_r7_c4.png); width:103px; height:27px;">
   <input type="text" style="border:0px; width:92px; height:15px; padding:5px; font-size:12px; background:none;" class="login_input adm_verify" name="adm_verify"  />
   </td>
   <td colspan="4"><img name="login_r7_c5" src="__TMPL__Common/images/login/login_r7_c5.png" width="58" height="4" border="0" id="login_r7_c5" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="4" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="3"><img name="login_r8_c5" src="__TMPL__Common/images/login/login_r8_c5.png" width="6" height="31" border="0" id="login_r8_c5" alt="" /></td>
   <td colspan="2"><img src="__ROOT__/verify.php"  id="verify" align="absmiddle" /></td>
   <td rowspan="5"><img name="login_r8_c8" src="__TMPL__Common/images/login/login_r8_c8.png" width="2" height="116" border="0" id="login_r8_c8" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="22" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2" colspan="2"><img name="login_r9_c6" src="__TMPL__Common/images/login/login_r9_c6.png" width="50" height="9" border="0" id="login_r9_c6" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="login_r10_c4" src="__TMPL__Common/images/login/login_r10_c4.png" width="103" height="8" border="0" id="login_r10_c4" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="8" border="0" alt="" /></td>
  </tr>
  <tr>
   <!--<td colspan="3"><img name="login_r11_c4" src="__TMPL__Common/images/login/login_r11_c4.png" width="114" height="31" border="0" class="login_button submit"  id="login_btn" alt="" /></td>-->
   <td colspan="3"><input type="submit" value="登陆后台" style="width: 114px;height: 30px;"> </td>
   <td rowspan="2"><img name="login_r11_c7" src="__TMPL__Common/images/login/login_r11_c7.png" width="45" height="85" border="0" id="login_r11_c7" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="31" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="login_r12_c4" src="__TMPL__Common/images/login/login_r12_c4.png" width="114" height="54" border="0" id="login_r12_c4" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="54" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="9"><img name="login_r13_c1" src="__TMPL__Common/images/login/login_r13_c1.png" width="695" height="66" border="0" id="login_r13_c1" alt="" /></td>
   <td><img src="__TMPL__Common/images/login/spacer.gif" width="1" height="66" border="0" alt="" /></td>
  </tr>
</table>
</form>
</body>
</html>