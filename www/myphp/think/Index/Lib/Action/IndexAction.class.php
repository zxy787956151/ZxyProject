<?php
	header("Content-Type:text/html;charset=utf-8");
// 本类由系统自动生成，仅供测试用途
//此为前台控制器文件
class IndexAction extends Action {
    //继承Action控制器
    public function index(){
	// $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	// echo '配置成功!';

        // $db = M('user'); 
        // $result = $db->select();
        // dump($result);
    
        // echo "这是我的前端应用的首页!";
        // echo C('db_host');

        //打印数组
        // dump($_SERVER);
        // echo "<pre>";//格式化，我这不格式化一样
        // var_dump($_SERVER);
        // echo "<pre>";//格式化，这块就必须格式化
        // print_r($_SERVER);
        // load('@.function');//load临时加载,@符表示当前目录下,就不用该配置文件的LOAD_EXT_FILE了
        // //所谓临时加载就是只在当前方法有效,下面show方法里p方法无效
        // p($_SERVER);

        // echo __ROOT__;//think的一个常量"/think"
        // echo __PUBLIC__;var_dump(defined('__PUBLIC__'));defined检测是否为常量结果false
        $this -> display();//许愿墙
    }

    public function show(){
        load('@.function');
        // p($_SERVER);
        say();
        p($_SERVER);
    }

    // public function delete(){
    // 	echo "这里是Index控制器里的删除方法";
    // }

    // public function add(){
    // 	echo "这里是Index控制器里的添加方法";
    // }
}