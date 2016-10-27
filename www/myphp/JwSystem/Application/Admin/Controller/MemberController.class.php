<?php
namespace Admin\Controller;
use Admin\Controller;
include 'base.php';
/**
 * 用户管理
 */
class MemberController extends BaseController
{
    /**
     * 用户列表
     * @return [type] [description]
     */
    public function index($key="")
    {
        if($key === ""){
            $model = M('member');  
        }else{
            $where['username'] = array('like',"%$key%");
            $where['email'] = array('like',"%$key%");
            $where['_logic'] = 'ord(string)';
            $model = M('member')->where($where); 
        } 
        
        $count  = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Extend\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $member = $model->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id DESC')->select();
        $this->assign('member', $member);
        $this->assign('page',$show);
        $this->display();     
    }

    /**
     * 添加用户
     */
    public function add()
    {
        //默认显示添加表单
        if (!IS_POST) {
            $this->display();
        }
        if (IS_POST) {
            //如果用户提交数据

            if ($_POST['type']==1) {
                $model = M('Member');

                $gui = new \Home\Model\MemberModel();
                $rep = array("{","}");
                $phoname = str_replace($rep,'',$gui->create_guid());
                $data = array(
                    'username' =>   $_POST['username'],
                    'email' => $_POST['email'],
                    'password' =>  md5($_POST['password']),
                    'create_at' => time(),
                    'login_ip'  => get_client_ip(),
                    'status'    => 1,
                    'type'      => 1,
                    'phoname' =>  $phoname.".png",
                    'phourl' =>  __ROOT__.'/'.APP_PATH.'Home/View/Public/head',
                    'hw' => $_POST['hw'],
                    );

                // p($_FILES);
                    //上传头像文件
                    //上传路径
                       // $uploads_dir = __ROOT__.'/'.APP_PATH.'Home/View/Public/head';
                                $name = $_FILES["upfile"]["name"];
                                $tmp_name = $_FILES["upfile"]["tmp_name"];
                                
                                $move = move_uploaded_file($tmp_name, "e:/wamp/www/myphp/JwSystem/Application/Home/View/Public/head/$phoname.png");
                //end upload

                if ($add = $model->data($data)->add()&&$move) {
                    $this->success("用户添加成功", U('member/index'));
                }
            }else{
                $model = D("Member");
                if (!$model->create()) {
                    // 如果创建失败 表示验证没有通过 输出错误提示信息
                    $this->error($model->getError());   
                    exit();
                } else {
                    if ($model->add()) {
                        $this->success("用户添加成功", U('member/index'));
                    } else {
                        $this->error("用户添加失败");
                    }
                }
            }


            
        }
    }
    /**
     * 更新管理员信息
     * @param  [type] $id [管理员ID]
     * @return [type]     [description]
     */
    public function update()
    {
        //默认显示添加表单
        if (!IS_POST) {
            $model = M('member')->find(I('id',"addslashes"));
            $this->assign('model',$model);
            $this->display();
        }
        if (IS_POST) {
            $model = D("Member");
            if (!$model->create()) {
                $this->error($model->getError());
            }else{
                //验证密码是否为空   
                $data = I();
                unset($data['password']);
                if(I('password') != ""){
                    $data['password'] = md5(I('password'));
                }
                //强制更改超级管理员用户类型
                if(C('SUPER_ADMIN_ID') == I('id')){
                    $data['type'] = 2;
                }
                //更新
                if ($model->save($data)) {
                    $this->success("用户信息更新成功", U('member/index'));
                } else {
                    $this->error("未做任何修改,用户信息更新失败");
                }        
            }
        }
    }
    /**
     * 删除管理员
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
    	$id = intval($id);
    	if(C('SUPER_ADMIN_ID') == $id) $this->error("超级管理员不可禁用!");
        $model = M('member');
        //查询status字段值
        $result = $model->find($id);
        //更新字段
        $data['id']=$id;
        if($result['status'] == 1){
        	$data['status']=0;
        }
        if($result['status'] == 0){
        	$data['status']=1;
        }
        if($model->save($data)){
            $this->success("状态更新成功", U('member/index'));
        }else{
            $this->error("状态更新失败");
        }
    }
}

// create table HomeUser(id int unsigned not null primary key auto_increment,firstname char(20),lastname char(20),email char(40),pwd char(30));
// create table Contact(id int unsigned not null primary key auto_increment,name char(30),email char(30),subject char(30),message char(50));
// create table product(id int unsigned not null primary key auto_increment,photo char(20),name char(20),price char(20),color char(20),size char(20),TAG char(20),SKU char(20),cid int,description char(50),reviews char(40));
// create table car(id int unsigned not null primary key auto_increment,cid int,stock_status char(20));