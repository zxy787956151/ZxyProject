<?php 
	namespace Home\Model;
	use Think\Model;
	include 'base.php';
//※※※※※※ AxxBxx命名对应数据库axx_bxx
	Class ProColModel extends Model{
		Public function MtoM($majortab,$majid,$minortab,$minid,$middletab,$resultKfield,$resultVfield){
			// $mtom = D('ProCol')->mtom('product','pid','color','cid','pro_col','name','color');

			$id1 = M("$majortab")->select();	
			$i = 0;
			$j = 0;
			foreach ($id1 as $v) {
				$k = $v["$resultKfield"];
				$where1["$majid"] = $v["$majid"];
 				$id2 = M("$middletab")->where($where1)->select();
 				
 				foreach ($id2 as $v) {
 					$where2["$minid"] = $v["$minid"];			
 					$col = M("$minortab")->where($where2)->select();
 					foreach ($col as $v) {
 						$result["$k"]["$i"] = $v["$resultVfield"];
 						$i++;	
 					}
 				}

			}

			return $result;
		}
	}
 ?>