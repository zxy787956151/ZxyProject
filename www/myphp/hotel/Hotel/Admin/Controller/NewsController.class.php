<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends Controller{
	//新闻列表视图
	public function index(){
		$this->news=M('news')->where(array('del'=>0))->select();
		$this->display();
	}
	//添加新闻视图
	public function addNews(){
		$this->display();
	}
	//新闻表单处理
	public function runaddNews(){
		$db=M('news');
        $data['title']=I('title');
        $data['time']=time();
        $data['content']=I('content');
        $db->create($data);
        if($db->add()){
        	$this->success('新闻发表成功',U('News/index'));
        }else{
        	$this->error('新闻发表失败，请重试');
        }
	}
	//新闻删除与还原
	public function update(){
        $type=I('type');
        $tips=$type?'删除':'还原';
        $update=array(
            'id'=>I('id'),
            'del'=>$type
        );
        if(M('news')->save($update)){
             $this->success($tips.'成功',U('News/index'));
        }else{
             $this->error($tips.'失败');
        }
	}
	//回收站视图
	public function recycle(){
	    $this->news=M('news')->where(array('del'=>1))->select();
        $this->display('index');
	}
    //彻底删除
    public function drop(){
        $id=I('id');
        if(M('news')->delete($id)){
           $this->success('彻底删除成功',U('News/recycle'));
        }else{
           $this->error('彻底删除失败');
        }
    }
    //清空回收站
    public function clear(){
        if(M('news')->where(array('del'=>1))->delete()){
           $this->success('回收站清空成功',U('News/recycle'));
        }else{
           $this->error('回收站清空失败');
        }
    }
}
?>