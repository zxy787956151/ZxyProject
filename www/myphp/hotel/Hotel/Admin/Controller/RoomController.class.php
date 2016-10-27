<?php
namespace Admin\Controller;
use Think\Controller;
class RoomController extends Controller{
    //客房列表视图
	public function index(){
	   $this->display();
	}
	//添加客房视图
	public function addRoom(){
	   $this->display();
	}
	//上传图片
	public function upload(){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    //p($upload);die;
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
        }else{// 上传成功
        //foreach($info as $file){
          // echo $file['savepath'].$file['savename'];
          //}
        $src=$info['file']['savepath'].$info['file']['savename'];
        $this->ajaxReturn(array('status'=>1,'message'=>'上传成功'));

        }
    }
}
?>