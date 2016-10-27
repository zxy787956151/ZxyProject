<?php

  header("Content-Type:text/html;charset=utf-8");
	Class RbacAction extends Action {
		//用户列表
		Public function index() {
        $this->user = D('UserRelation')
        ->field('password', true)
        ->relation(true)->select();
        //relation true,开启多表关联,关联多表的时候true改为表名
        /*field('password', true)除了密码之外全都要 
          <=> field(array('id', 'username', 'logintime', 'loginip', 'lock'))*/
        
        // p($result);
        // die();

        /*实例化模型文件,用D别用M
        用M实例化的叫普通模型,D处理的叫关联模型,视图模型*/
        $this->display();
		}
		//角色列表
		Public function role() {
			// echo "11111";
      $this->role = M('role')->select();
      // p($role);
      $this->display();
		}
		//节点列表
		Public function node() {
			// echo "1";
      // $this->node = M('node')->order('sort')->select();
      //将node以对象的形式分配到模板上面而不是变量$node

      $field =array('id', 'name', 'title', 'pid');
      $node = M('node')->field($field)->order('sort')->select();// order-排序 
      $this->node = node_merge($node);
      // p($node);
      // die();

      // p($this->node);
      // die();
     
      $this->display();
		}
		//添加用户
		Public function addUser() {
      $this->role = M('role')->select();
      // 原为$role = M('role')->select();,加上this->意为分配到模板上
			$this->display();
		}

    //添加用户表单处理
    Public function addUserHandle() {
        //用户信息
        // p($_POST);
        $user = array(
            'username' => I('username'),
            'password' => I('password', '', 'md5'),
            'logintime' => time(),
            'loginip' => get_client_ip()
          );
        //所属角色
        $role =array();

        if ($uid = M('user')->add($user)) {
            foreach ($_POST['role_id'] as $v) {
                $role[] = array(
                    'role_id' => $v,
                    'user_id' => $uid
                  );
            }
            //添加用户角色
            M('role_user')->addAll($role);

            $this->success('添加成功', U('Admin/Rbac/index'));
        } else {
            $this->error('添加失败');
        }
    }

		//添加角色
		Public function addRole() {
		  $this->display();
		}

    //添加角色表单处理
    Public function addRoleHandle() {
      // p($_POST);
      if (M('role')->add($_POST)) {
        $this->success('添加成功',U('Admin/Rbac/role'));
      }
      else {
        $this->error('添加失败!');
      }
    }

		//添加节点
		Public function addNode() {
      $this->pid = I('pid', 0, 'intval');//同$pid = isset($_GET['pid']) ? $_GET['pid'] :0;
      $this->level = I('level',1 , 'intval');

      switch ($this->level) {
        case '1':
          $this->type= '应用';
          break;

        case '2':
          $this->type= '控制器';
          break;
          
        case '3':
          $this->type= '动作方法';
          break; 
      }

      // p($_GET);die;
      $this->display();
		}
    //添加节点表单处理
    Public function addNodeHanlde(){
      // p($_POST);
      if (M('node')->add($_POST)) {
        $this->success('添加成功', U('Admin/Rbac/node'));
      }
      else{
        $this->error('添加失败!');
      }
    }

    //配置权限
    Public function access() {
        $rid = I('rid', 0, 'intval');
        // echo $rid;

        $field = array('id', 'name', 'title', 'pid');
        $node = M('node')->order('sort')->field($field)->select();
        // p($node);
        //$this->node = node_merge($node);
        
        //原有权限
        // $access = M('access')->where(array('role_id' => $rid))->select();
        $access = M('access')->where(array('role_id' => $rid))->getField('
          node_id', true);

        // p($node);//打印节点
        // p($access);//打印权限
        // die();

        $this->node = node_merge($node, $access);

        $this->rid = $rid;  
        $this->display();
    }

    //修改权限
    Public function setAccess(){
      // p($_POST);

      $rid = I('rid', 0, 'intval');
      $db = M('access');

      //清空原权限
      $db->where(array('role_id' => $rid))->delete();

      //组合新权限
      $data = array();
      foreach ($_POST['access'] as $v) {
        $tmp = explode('_', $v);
        $data[] = array(
            'role_id' => $rid,
            'node_id' => $tmp[0],
            'level' => $tmp[1]
          );
      }
      // p($data);
      // $result = $db -> addAll($data);
      // p($result);

      //插入新权限
      if ($db->addAll($data)) {
          $this->success('修改成功', U('Admin/Rbac/role'));
      } else {
          $this->error('修改失败');
      }

    }
	}
?>

<!-- CREATE TABLE IF NOT EXISTS `hd_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hd_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hd_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `hd_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; -->