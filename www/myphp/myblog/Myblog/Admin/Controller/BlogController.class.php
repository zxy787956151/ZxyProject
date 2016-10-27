<?php
namespace Admin\Controller;
use Think\Controller;
class BlogController extends Controller{
	public function index(){
        $this->blog=M('blog')->where(array('del'=>0))->select();
	    $this->display();
	}
	public function addBlog(){
	    $this->display();
	}
	public function runaddBlog(){
	    $db=M('blog');
        $data['title']=I('title');
        $data['where']=I('where');
        $data['content']=stripslashes(htmlspecialchars_decode($_POST['content']));
        //$data['content']=I('content');
        $data['time']=time();
        $data['photo']=I('file');
        $db->create($data);
        if($db->add()){
           $this->success('博文发表成功',U('Blog/index'));
        }else{
           $this->error('博文发表失败');
        }

   	}
    //回收站视图
    public function trach(){
         $this->blog=M('blog')->where(array('del'=>1))->select();
         $this->display('index');
    }
    //博文还原和删除
    public function delete(){
         $type=I('type');
         $tips=$type?'删除':'还原';
         $update=array(
            'id'=>I('id'),
            'del'=>$type,
         );
         if(M('blog')->save($update)){
             $this->success($tips.'成功',U('Blog/index'));
         }else{
             $this->error($tips.'失败');
         }
    }
    //彻底删除
    public function drop(){
         $id=I('id');
         $where=array('id'=>$id);
         if(M('blog')->where($where)->delete()){
             $this->success('彻底删除成功',U('Blog/trach'));
         }else{
             $this->error('彻底删除失败');
         }
    }
    //清空回收站
    public function clear(){
        if(M('blog')->where(array('del'=>1))->delete()){
           $this->success('回收站清空成功',U('Blog/trach'));
        }else{
           $this->error('回收站清空失败');
        }
    }

}
?>