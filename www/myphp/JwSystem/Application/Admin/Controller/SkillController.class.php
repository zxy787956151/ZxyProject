<?php
namespace Admin\Controller;
use Admin\Controller;
include 'base.php';
/**
 * 链接管理
 */
class SkillController extends BaseController
{
    /**
     * 链接列表
     * @return [type] [description]
     */
    public function index($key="")
    {   
        $this->smenu = M('skill')->select();
        $this->display(); 
            
    }

    /**
     *  选为优秀作品
     */
    Public function perfect(){
        $where['id'] = $_GET['id'];
        if ($save = M('finish')->where($where)->setField('perfect',1)) {
            $this->success("选为优秀作品！");
        }
    }

    /**
     *  取消优秀作品
     */

    public function outper(){
        $where['id'] = $_GET['id'];
        if ($save = M('finish')->where($where)->setField('perfect',0)) {
            $this->success("已取消优秀作品！");
        }
    }

    /**
     * 添加链接
     */
    public function add()
    {
        //默认显示添加表单
        if (!IS_POST) {
            $this->display();
        }
        if (IS_POST) {
            //如果用户提交数据
            $model = D("Skill");
            if (!$model->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($model->getError());
                exit();
            } else {
                //善用I函数
                
                if ($model->add()) {
                    $sid = M('Skill')->order('id desc')->field('id')->limit(1)->select();
                    
                    $gui = new \Home\Model\MemberModel();
                    $rep = array("{","}");  
                    $phoname = str_replace($rep,'',$gui->create_guid());
                    $name = $_FILES["photo"]["name"];   
                    $tmp_name = $_FILES["photo"]["tmp_name"];
                    $move = move_uploaded_file($tmp_name, "e:/wamp/www/myphp/JwSystem/Application/Home/View/Public/technology/frontend/$phoname.png");

                    switch (I('menutitle')) {
                        case '前端':
                            $data = array(
                                'id' => $sid['0']['id'],
                                'phoname' => $phoname.".png",
                                'menuid' => 1,
                                'class' =>frontend,
                                'class2' =>front,
                            );
                            break;
                        case 'PHP':
                            $data = array(
                                'id' => $sid['0']['id'],
                                'phoname' => $phoname.".png",
                                'menuid' => 2,
                                'class' =>php,
                                'class2' =>php,
                            );
                            break;
                        case '.NET':
                            $data = array(
                                'id' => $sid['0']['id'],
                                'phoname' => $phoname.".png",
                                'menuid' => 3,      
                                'class' =>net,
                                'class2' =>net,
                            );
                            break;
                        case 'FUTURE':
                            $data = array(
                                'id' => $sid['0']['id'],
                                'phoname' => $phoname.".png",
                                'menuid' => 4,
                                'class' =>future,
                                'class2' =>future,
                            );
                            break;
                        
                    }

                    
                    if ($model->save($data)&&$move) {
                        $this->success("链接添加成功", U('skill/index'));
                    }
                } else {
                    $this->error("链接添加失败");
                }
            }
        }
    }
    /**
     * 更新链接信息
     * @param  [type] $id [链接ID]
     * @return [type]     [description]
     */
    public function update($id)
    {
    		$id = intval($id);
        //默认显示添加表单
        if (!IS_POST) {
            $model = M('skill')->where("id= %d",$id)->find();
            $this->assign('model',$model);
            $this->display();
        }
        if (IS_POST) {
            $model = D("skill");
            if (!$model->create()) {
                $this->error($model->getError());
            }else{
                if ($model->save()) {
                    $this->success("更新成功", U('skill/index'));
                } else {
                    $this->error("更新失败");
                }        
            }
        }
    }
    /**
     * 删除链接
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
    	$id = intval($id);
        $model = M('skill');
        $result = $model->delete($id);
        if($result){
            $this->success("链接删除成功", U('skill/index'));
        }else{
            $this->error("链接删除失败");
        }
    }
}

// create table skill(id int unsigned not null primary key auto_increment,menu char(30),phoname char(50),descr varchar(200),link char(200));
