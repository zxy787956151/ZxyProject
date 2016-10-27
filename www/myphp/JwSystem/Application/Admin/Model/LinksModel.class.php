<?php
namespace Admin\Model;
use Think\Model;
class LinksModel extends Model{
    protected $_validate = array(
        array('menu','require','请填写菜单项！'), //默认情况下用正则进行验证
        array('menutitle','require','请填写所属类别！'), //默认情况下用正则进行验证
        array('photo','require','请上传图片！'), //默认情况下用正则进行验证
        array('link','/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/','链接格式错误',0,'regex',self::MODEL_BOTH), //默认情况下用正则进行验证
        array('descr','require','请将三描述填写完全！'), //默认情况下用正则进行验证
        array('descr2','require','请将三描述填写完全！'), //默认情况下用正则进行验证
        array('descr3','require','请将三描述填写完全！'), //默认情况下用正则进行验证
     );
}