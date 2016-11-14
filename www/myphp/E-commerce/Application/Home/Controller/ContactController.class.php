<?php 
	namespace Home\Controller;
	use Think\Controller;

	Class ContactController extends Controller{
		Public function index(){
			$this->arr = D('category')->getTree(M('category')->select(),0);
			$this->display();
		}

		Public function add(){
            $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
            );
            if ($pd = M('Contact')->data($data)->add()){
                $this->success('Thank You For Your Message!');
            }

        }
	}
 ?>