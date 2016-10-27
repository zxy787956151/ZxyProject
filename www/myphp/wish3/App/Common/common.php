<?php
/**
 * 前后台公用函数文件
 */

function p ($array) {
	dump($array, 1,'<pre>', 0);
}

/**
 * 发布内容表情替换
 */
function replace_phiz($content) {
	preg_match_all('/\[.*?\]/is', $content, $arr);//正则
	// p($arr);

	if ($arr[0]) { //是否发布了表情
		$phiz = F('phiz', '', './Data/');
		// p($phiz);
		foreach ($arr[0] as $v) {
			foreach ($phiz as $key => $value) {
				if ($v == '[' . $value . ']') {
					$content = str_replace($v, '<img src="' . __ROOT__ . '/Public/Images/phiz/' . $key . '.gif"/>', $content);
				}
				continue;
			}
		}
	}

	// echo $content;
	return $content;
}
?>