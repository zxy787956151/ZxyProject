<?php 
	namespace Home\Model;
	use Think\Model;
	Class ProductModel extends Model{
		// $this->PageNow = $Dpro->group('Product','9','2',$GLOBALS['pagNum']);

		Public function group($tablename,$num,$page,$pagenum){
			$start = ($page-1)*$num;
			$lim = M("$tablename")->limit("$start,$num")->select();					
				
			return $lim;
		}

		Public function GetPageNum($tablename,$num){

			$all = M("$tablename")->select();
			$i = 0;
			foreach ($all as $v) {		$i++;	}
			if ($i%$num==0) {
				$pageNum = $i/$num;
			}else{
				$pageNum = floor($i/$num)+1;
				//floor 舍去法求整
				//ceil  进一法求整
			}

			return $pageNum;
		}
	}
 ?>