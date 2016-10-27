<?php
class MemberModel extends Model
{
 protected $tableName = 'member';
 protected $_validate = array(
        array('username', 'require', '用户名不能为空', 0, '', 1),
		array('userpwd', 'require', '用户密码不能为空', 0, '', 1),
		array('userpwd2','userpwd','确认密码不一致',0,'confirm'),
		array('email', 'email', '邮件email输入不正确', 0, '', 1), 
		array('username', '', '已经存在该用户，请更换用户名', 0, 'unique', 1),
    );
}
?>