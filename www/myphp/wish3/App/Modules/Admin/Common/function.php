<?php
/**
 * 递归重组节点信息为多维数组
 *$node [要处理的节点数组]
 *$pid [父级ID]
 */

//值得琢磨的递归函数p22,10min40s
	function node_merge($node, $access = null, $pid = 0) {
		// echo 'function:node_merge';

		// p($node);
		$arr = array();

		foreach ($node as $v) {

			if (is_array($access)) {
				$v['access'] = in_array($v['id'], $access) ? 1 : 0;
			}

			if ($v['pid']==$pid) {
				$v['child'] = node_merge($node, $access, $v['id']);
				$arr[]=$v;
			}

			
		}

		return $arr;
	}
?>