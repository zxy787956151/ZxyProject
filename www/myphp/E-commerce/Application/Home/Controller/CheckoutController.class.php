<?php 
	namespace Home\Controller;
	use Think\Controller;

	Class CheckoutController extends Controller{
		Public function index(){
			$this->arr = D('category')->getTree(M('category')->select(),0); //menu
            $this->proList = D('Car')->carList();
            /*
             把car表里的id加进这个proList里
             */
			$this->display();
		}

		Public function addCar(){
            $car = M('car');
            $where['email'] = $_SESSION['user'];
            $hu = M('homeuser')->where($where)->field('id')->select();
            $data = array(
                'stock_status' => '1',
                'hid' => $hu['0']['id'],
                'pid' => $_GET['pid'],
            );

            if ($pd = $car->add($data)){
                $this->success('加入购物车成功!');
            }
        }

        Public function close(){

        }
	}
 ?>