<?php
namespace Admin\Controller;
use Think\Controller;
class PhotoController extends Controller{
	public function index(){
	   $this->display();
	}
	public function addPhoto(){
	   $this->display();
	}
	public function upload(){
	$upload=new \Think\Upload();
    $upload->maxSize=3145728 ;
    $upload->exts=array('jpg', 'gif', 'png', 'jpeg');
    $upload->rootPath='./Public/Uploads/';
    $upload->savePath=''; 
    $info=$upload->upload();
    if(!$info) {
        $this->error($upload->getError());
        }else{
        //$src=$info['file']['savepath'].$info['file']['savename'];
        //$this->ajaxReturn(array('status'=>1,'message'=>'上传成功'));
        $db=M('photo');
        $data['src']=$info['file']['savepath'].$info['file']['savename'];
        $db->create($data);
        if($db->add()){
           $this->success('照片添加成功');
           }else{
           $this->error('照片添加失败');
           }
	    }
    }
}
?>