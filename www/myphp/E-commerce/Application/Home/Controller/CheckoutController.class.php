<?php 
	namespace Home\Controller;
	use Think\Controller;

	Class CheckoutController extends Controller{
		Public function index(){
			$this->arr = D('category')->getTree(M('category')->select(),0); //menu
            $this->proList = D('Car')->carList();
			$this->display();
		}

		Public function addCar(){
            $pd_user = D('Car')->validate('user');
            if (!$pd_user){
                $this->error('未登录!');
            }
            $car = M('car');
            $where['email'] = $_SESSION['user'];
            $hu = M('homeuser')->where($where)->field('id')->select();
            $qua = M('car')->where("pid=$_GET[pid]")->select();
            if ($qua!=null){
                $data = array(
                    'stock_status' => '1',
                    'hid' => $hu['0']['id'],
                    'pid' => $_GET['pid'],
                    'quantity' =>((float)$qua['0']['quantity']+1),
                );
                $where['id'] = $qua['0']['id'];
                if ($pd = $car->where($where)->save($data)){
                    $this->success('加入购物车成功!');
                }
            }else{
                $data = array(
                    'stock_status' => '1',
                    'hid' => $hu['0']['id'],
                    'pid' => $_GET['pid'],
                );
                if ($pd = $car->add($data)){
                    $this->success('加入购物车成功!');
                }
            }

        }

        Public function close(){
            if($pd = M('car')->where("id = $_GET[id]")->delete()){
                $this->success('宝物已移除购物车!');
            }
        }

        Public function clear(){

        }
	}
 ?>