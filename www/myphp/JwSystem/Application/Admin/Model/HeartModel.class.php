<?php
namespace Admin\Model;
use Think\Model;
class HeartModel extends Model{
    protected $_validate = array(
        array('menu','require','请填写菜单项！'), //默认情况下用正则进行验证
      );
}
