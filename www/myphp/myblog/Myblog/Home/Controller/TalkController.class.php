<?php
namespace Home\Controller;
use Think\Controller;
class TalkController extends Controller{
	public function index(){
	  // $mem = new \Think\Cache\Driver\Memcache;
	  // $id=I('id');
   //    $talk=M('public')->cache('talk',3600)->select();
   //    if(!$talk){
   //    $data=M('public')->where(array('cid'=>$id))->select();
   //    S('talk',$data);
   //    $talk=S('talk');
   //    }
   //    $this->talks=$talk;
            $this->talks=M('public')->where()->select();
	  $this->cate=M('cate')->order('sort')->select();
	  $this->display();
	}
}
?>