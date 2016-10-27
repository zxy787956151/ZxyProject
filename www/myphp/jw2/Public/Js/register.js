function chk(){
	if(document.form2.username.value==""){
	alert('用户名不允许为空');
	return false;
	}
	if(document.form2.pwd.value==""){
	alert('密码不允许为空');
	return false;
	}
	if(document.form2.rpwd.value==""){
	alert('确认密码不允许为空');
	return false;
	}
	if(document.form2.pwd.value!=document.form2.rpwd.value){
	alert('两次输入密码不相同，请重新输入');
	return false;
	}
	if(document.form2.direction.value==""){
	alert('学习方向不允许为空');
	return false;
	}
	if(document.form2.time.value==""){
	alert('加入时间不允许为空');
	return false;
	}
	if(document.form2.work.value==""){
	alert('工作室职务不允许为空');
	return false;
	}
	if(document.form2.qq.value==""){
	alert('联系qq不允许为空');
	return false;
	}
	if(document.form2.img.value==""){
	alert('必须要上传头像');
	return false;
	}
return true;
}