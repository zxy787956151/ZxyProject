<?php 
	namespace Home\Controller;
	use Think\Controller;
	include 'base.php';
    require "mysqlisession.class.php";

	Class IndexController extends Controller{
		Public function index(){
			session_start();
			// if (isset($_GET['num'])) {
			// 	$start = 3*($_GET['num']-1);
			// }else{
			// 	$start = 0;
			// }

			//问题分页
			// $m = M('question');      
	  //       $count = $m->count();
	  //       $p = getpage($count,3);
	  //       $list = $m->field(true)->order('id')->limit($p->firstRow, $p->listRows)->select();
	  //      	$this->assign('que', $list); // 赋值数据集
	  //       $this->assign('page', $p->show()); // 赋值分页输出
			// end问题分页

			// $this->que = M('question')->limit($start,3)->select();

			//menu菜单输出
			$this->menu = M('Category')->select();
			//问题输出
			$this->que = M('question')->limit(0,3)->select();


			$this->ind = 0;	
			if (isset($_SESSION['user'])) {
				$where['username'] = $_SESSION['user'];
				$this->head = M('member')->where($where)->select();
			}else{
				$this->head = array('0'=>0);
			}
			
			
			$this->ans = M('answer')->select();

			$this->pageNum = D('question')->GetPageNum('question',3);
			$this->collect = M('question')->order('collect desc')->limit(0,3)->select();
			$this->hot = M('question')->order('ansnum desc')->limit(0,5)->select();
			$this->hw = M('homework')->order('id desc')->limit(1)->select();
			$hid = M('homework')->order('id desc')->limit(1)->field('id')->select();
			$where2['hid'] = $hid['0']['id'];
			$this->fin = M('finish')->where($where2)->select();
			$condition = $hid['0']['id'];
			$this->nofin = M('member')->query("SELECT * FROM member WHERE id NOT IN (SELECT mid FROM finish WHERE hid=$condition) AND type=1;");

			//优秀作品输出
			$hw2 = M('homework')->order('id desc')->limit(1)->field('title')->select();
            $where3['perfect'] = 1; 
            $per = M('finish')->where($where3)->limit(0,2)->select();
            foreach ($per as $k => $v) {
                $where3['id'] = $v['mid'];
                $name = M('member')->where($where3)->field('username')->select();
                $this->assign("name$k",$name['0']['username']);

                $this->assign("fileurl$k",$v['fileurl']);
                $this->assign("filename$k",$v['filename']);
            }
            $this->assign('title',$hw2['0']['title']);

            //技术输出
            	//distinct 去重
			$this->skititle = M('skill')->field('distinct(menutitle)')->select();

			$skitit = M('skill')->group('menuid')->field('menutitle')->select();

			for ($i=0; $i <count($skitit) ; $i++) {
				$where4['menuid'] = $i+1; 
				$group = M('skill')->where($where4)->select();
				$skigroup["$i"] = $group;
			}
            $this->assign('skigroup',$skigroup);

            //心路输出
            $heart = M('heart')->order('id desc')->limit(0.3)->select();
            //怎么取最新的三条????,答:倒叙排列前三条就是了!!
            foreach ($heart as $hk => $hv) {
            	$where5['id'] = $hv['mid'];
            	$heamem = M('member')->where($where5)->select();
            	foreach ($heamem as $mv) {
            		$heartarr["$hk"]['member'] = $mv['username'];
	            	$heartarr["$hk"]['content'] = $hv['content'];
	            	$heartarr["$hk"]['phoname'] = $mv['phoname'];
	            	$heartarr["$hk"]['phourl'] = $mv['phourl'];
            	}
            }

            $this->assign('heartarr',$heartarr);


   //          $sess = new MySQLiSessionHandler("localhost","root","jason","chapter18","default","sessioninfo");
			// $_SESSION['name'] = "Jason";	

			$this->display();


		}

		// Public function test(){
		// 	//会进入函数.html
		// 	$this->que = M('question')->limit(3,3)->select();
		// }

		Public function ajax(){
			//ajax
			if(@$_GET['ajax']==1){
				$arr['success']=1;
				$start = 3*($_GET['start']-1);
				
				$arr['start'] = $_GET['start'];		
				
				$all = M('question')->select();
				$arr['allNum'] = 0;
				foreach ($all as $v) {
					$arr['allNum']++;
				}

				$que = M('question')->limit($start,3)->select();
				foreach ($que as $k => $v) {
					$arr["$k"] = $v;
					$where['username'] = $v['user']; 
					$pho = M('member')->where($where)->select();
					foreach ($pho as $v2) {
						$arr["$k"]['phourl'] = $v2['phourl'];
						$arr["$k"]['phoname'] = $v2['phoname'];
					}
					//字符串切割
					$arr["$k"]['qSmallPart'] = mb_substr($arr["$k"]['qcontent'], 0, 100, 'utf-8');
					$arr["$k"]['qLargePart'] = mb_substr($arr["$k"]['qcontent'], 100, strlen($arr["$k"]['qcontent']), 'utf-8');
				
					$where2['qid'] = $v['id'];
					$ans = M('answer')->where($where2)->select();
					foreach ($ans as $k2 => $v3) {
						$where3['username'] = $v3['user']; 
						$anspho = M('member')->where($where3)->select();
						foreach ($anspho as $v4) {
							$arr["$k"]["$k2"]['ansuser'] = $v3['user'];
							$arr["$k"]["$k2"]['acontent'] = $v3['acontent'];
							$arr["$k"]["$k2"]['ansurl'] = $v4['phourl'];
							$arr["$k"]["$k2"]['ansname'] = $v4['phoname'];
						}
					}
				}

				if(($arr['allNum']%3)!=0){
					$arr['pageNum'] = floor($arr['allNum']/3)+1;
					$arr['lastNum'] = $arr['allNum']%3;
				}else{
					$arr['pageNum'] = $arr['allNum']/3;
					$arr['lastNum'] = 3;
				}

				if ($_GET['start']==$arr['pageNum']) {
					$arr['nowNum'] = $arr['lastNum'];
				}else{
					$arr['nowNum'] = 3;					
				}

				// p($arr);
				echo json_encode($arr);	//将数值转换成json数据存储格式

			}	

		}

		Public function login(){
			$mem = D('Member');

			// if (!$mem->create()) {
			// 	$this->error($mem->getError());
   //              exit();
			// }else{
				$where['username'] = $_POST['user'];
				$where['type'] = 1;
				$pwd = $mem->where($where)->select();
				foreach ($pwd as $v) {}
				if (md5($_POST['pwd'])==$v['password']) {
					//用户跟随为什么不用会话!
					$_SESSION['user'] = $v['username'];
					$this->success("登录成功!",U('Index/index?user=',array("user"=>$v['username'])));
				}else{
					$this->error("账号或密码错误!");
				}
				
			// }
		}

		Public function out(){
			session_start();
			$_SESSION['user'] = NULL;
			if (!isset($_SESSION['user'])) {
				$this->success('账号已退出!');
			}
		}

		
	}

 ?>

<!-- create table sessioninfo(sid varchar(255) NOT NULL,value TEXT NOT NULL,expiration TIMESTAMP NOT NULL,PRIMARY KEY(sid)); -->