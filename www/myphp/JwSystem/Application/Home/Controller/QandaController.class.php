<?php 
	namespace Home\Controller;
	use Think\Controller;
	Class QandaController extends Controller{
		Public function que(){
			$que = M('question');
			if (!isset($_SESSION['user'])) {
				$this->error("请登录后再提问！");
			}else{
				$data = array(
						'title' => $_POST['title'],
						'qcontent' => $_POST['content'],
						'user' => $_SESSION['user'],
						'time' => time(),
							);

				if ($add = $que->add($data))
				{
					$this->success('提问成功！');
				}		
			}		
		}

		

		Public function ans(){
			$ans = M('answer');

			$data = array(
						'acontent' => $_POST['acontent'],
						'user' => $_SESSION['user'],
						'qid' => $_GET['qid'],
						'praise' =>	'0',
						'time' => time(),
							);


			$where['id'] = $_GET['qid'];
			$Lansnum = M('question')->where($where)->select();
			foreach ($Lansnum as $v) {
				$where2['id'] = $_GET['qid'];
				$ansnum = M('question')->where($where2)->setField('ansnum',$v['ansnum']+1);
			}
				if ($add = $ans->add($data)&&$ansnum)
				{
					$this->success('回答成功！');
				}
		}
		

		Public function praise(){

			$where['username'] = $_SESSION['user'];
			$mid = M('member')->where($where)->select();
			foreach ($mid as $v) {
				$where2['mid'] = $v['id'];
				$pd = M('mem_pra')->where($where2)->select();
				foreach ($pd as $v2) {
					if ($_GET['id']==$v2['qid']) {
						$this->error("不能重复点赞!");
					}													
				}
			
			}

			$where3['id'] = $_GET['id'];														
			$Lpra = M('answer')->where($where3)->select();

			foreach ($Lpra as $v3) {

					$where4['username'] = $_SESSION['user'];
					$mid = M('member')->where($where4)->select();
					foreach ($mid as $v4) {
						$data = array(
							'mid' => $v4['id'],
							'qid' => $_GET['id'],
						);
					if ($pra = M('answer')->where($where3)->setField('praise',$v3['praise']+1)&&$m_p = M('mem_pra')->add($data)) {
						$this->success("点赞成功!",U('Index/index'));
					}
					
				}
			}
		}

		

		Public function collect(){

			$where['username'] = $_SESSION['user'];
			$mid = M('member')->where($where)->select();
			foreach ($mid as $v) {
				$where2['mid'] = $v['id'];
				$pd = M('mem_col')->where($where2)->select();
				foreach ($pd as $v2) {
					if ($_GET['qid']==$v2['qid']) {
						$this->error("不能重复收藏!");
					}													
				}
			
			}

			$where3['id'] = $_GET['qid'];
			$Lcol = M('question')->where($where3)->select();
				foreach ($Lcol as $v3) {

				$where4['username'] = $_SESSION['user'];
				$mid = M('member')->where($where4)->select();
				foreach ($mid as $v4) {
					$data = array(
						'mid' => $v4['id'],
						'qid' => $_GET['qid'],
					);
					$m_c = M('mem_col')->add($data);
					
				}
				$col = M('question')->where($where3)->setField('collect',$v3['collect']+1);
				if ($col&&$m_c) {
					$this->success("收藏成功!");
				}
			}                                                    
			
		}
	}
 ?>

