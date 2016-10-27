<?php 
	namespace Admin\Controller;
	use Admin\Controller;
	/**
	 * 心路管理
	 */
	class HeartController extends BaseController{
		Public function index(){
			$heart = M('heart')->select();
            foreach ($heart as $hk => $hv) {
            	$where5['id'] = $hv['mid'];
            	$heamem = M('member')->where($where5)->select();
            	foreach ($heamem as $mv) {
            		$heartarr["$hk"]['id'] = $hv['id'];
            		$heartarr["$hk"]['member'] = $mv['username'];
	            	$heartarr["$hk"]['content'] = $hv['content'];
            	}
            }

            $this->assign('heartarr',$heartarr);
			$this->display();
		}

		Public function add(){
			
		}
	}	
 ?>