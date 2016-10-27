<?php

/***********************************************************
 * [大米CMS] (C)2011 - 2011 damicms.com
 *
 * @function 前台首页    Action
 *
 * @Filename IndexAction.class.php $
 *
 * @Author 追影 QQ:279197963 $
 *
 * @Date 2011-11-17 20:06:22 $
 *************************************************************/
class IndexAction extends BaseAction
{
    public function index()
    {
        ob_start();
//用于生成静态HTML
        $is_build = C('IS_BUILD_HTML');
        $static_file = './Html/' . cookie('think_template') . '/index.html';
        $path = './IndexAction.class.php';
        $php_file = basename($path);
        parent::html_init($static_file, $php_file, $is_build);
        $this->assign('cur_menu', 0);
        $config = F('basic', '', './Web/Conf/');
        //------------企业网站的东东----------------
//最新公告
        parent::lists(20, 0, 5, 'list_gao');
        //最新新闻
        parent::lists(18, 0, 9, 'list_new');
        //菜单目录
        parent::children_dir(22);
        //------------文章系统的东东-------------
        if (cookie('think_template') == 'xinwen') {
            $type = M('type');
            $article = M('article');
            //网站公告
            $notice = $article->where('status=1 AND typeid=' . $config['noticeid'])->field('aid,title')->order('addtime desc')->limit($config['noticenum'])->select();
            $this->assign('notice', $notice);
            unset($notice);
            //首页幻灯内容
            //先模式判断
            if ($config['flashmode'] == 0) {
                $hd = M('flash');
                $hd = $hd->where('status=1')->order('rank asc')->limit($config['ishomeimg'])->select();
                foreach ($hd as $k => $v) {
                    $hd[$k]['imgurl'] = __PUBLIC__ . "/Uploads/hd/" . $v['pic'];
                    if (empty($v['pic'])) {
                        $hd[$k]['imgurl'] = TMPL_PATH . cookie('think_template') . "/images/nopic.png";
                    }
                }
            } else {
                $hd = $article->where('isflash=1')->field('title,aid,imgurl')->order('addtime desc')->limit($config['ishomeimg'])->select();
                //判断处理图片地址
                foreach ($hd as $k => $v) {
                    $hd[$k]['url'] = U("articles/" . $v['aid']);
                    if (empty($v['imgurl'])) {
                        $hd[$k]['imgurl'] = TMPL_PATH . cookie('think_template') . "/images/nopic.png";
                    }
                }
            }
            $this->assign('flash', $hd);
            unset($flash);

            //首页top 2
            $map['istop'] = 1;
            $map['ishot'] = 1;
            $map['status'] = 1;
            $top = $article->where($map)->field('aid,title,note')->order('addtime desc')->limit(2)->select();
            $top[0]['title'] = msubstr($top[0]['title'], 0, 18, 'utf-8');
            $top[0]['note'] = msubstr($top[0]['note'], 0, 50, 'utf-8');
            $top[1]['title'] = msubstr($top[1]['title'], 0, 18, 'utf-8');
            $top[1]['note'] = msubstr($top[1]['note'], 0, 50, 'utf-8');
            $this->assign('top', $top);
            unset($top, $map);
            //首页栏目内容
            $list = $type->where('isindex=1')->order('irank asc')->field('typeid,typename,indexnum')->select();
            foreach ($list as $k => $v) {
                $data['status'] = 1;
                $data['typeid'] = $v['typeid'];
                $k % 2 == 0 ? $list[$k]['i'] = 0 : $list[$k]['i'] = 1;
                //方便定位广告,引入p
                $list[$k]['p'] = $k;
                $list[$k]['article'] = $article->where($data)->order('addtime desc')->field('title,aid,titlecolor')->limit($v['indexnum'])->select();
            }
            $this->assign('list', $list);
            unset($list);
            //首页投票
            $this->vote($config['indexvote']);

            //释放内存
            unset($type, $article);
        }
        //------------文章系统的东东结束-------------
        //友情链接
        $link = M('link');
        $map['islogo'] = 0;
        $map['status'] = 1;
        $lk = $link->where($map)->field('url,title')->order('rank')->select();
        $map['islogo'] = 1;
        $logolk = $link->where($map)->field('url,title,logo')->order('rank')->select();
        $this->assign('link', $lk);
        $this->assign('logolink', $logolk);
        unset($link, $logolk, $map);
//输出模板
        $this->display(TMPL_PATH . cookie('think_template') . '/index.html');
        if ($is_build == 1) {
            $c = ob_get_contents();
            if (!file_exists(dirname($static_file))) {
                @mkdir(dirname($static_file));
            }
            file_put_contents($static_file, $c);
        }
    }

    //ajax目录列表
    function ajax_list_dir()
    {
        $arr = get_files(TMPL_PATH . cookie('think_template') . '/list');
        $this->ajaxReturn($arr, '返回', 1);
    }

    //ajax目录列表
    function ajax_page_dir()
    {
        $arr = get_files(TMPL_PATH . cookie('think_template') . '/page');
        $this->ajaxReturn($arr, '返回', 1);
    }

    public function search()
    {
        if (empty($_REQUEST['k'])) {
            alert('请输入关键字!', 1);
        }
        inject_check($_GET['p']);
        $article = M('article');
        $map['status'] = 1;
        $keyword = inject_check(urldecode($_REQUEST['k']));
        $map['title'] = array('like', '%' . $keyword . '%');
        //导入分页类
        import('ORG.Util.Page');
        $count = $article->where($map)->count();
        $p = new Page($count, 20);
        //保持分页参数
        if ($_POST) {
		$allow_par = array('p','k');
            foreach ($_POST as $key => $val) {
			    if(in_array($key,$allow_par)){
                $p->parameter .= "/$key/" . urlencode($val);
				}
            }
        }
        $p->setConfig('prev', '上一页');
        $p->setConfig('header', '篇文章');
        $p->setConfig('first', '首 页');
        $p->setConfig('last', '末 页');
        $p->setConfig('next', '下一页');
        $p->setConfig('theme', "%first%%upPage%%linkPage%%downPage%%end%
		<span><select name='select' onChange='javascript:window.location.href=(this.options[this.selectedIndex].value);'>%allPage%</select></span><span>共<font color='#CD4F07'><b>%totalRow%</b></font>篇文章 20篇/每页</span>");
        //查询数据库
        $prefix = C('DB_PREFIX');
        $list = $article->join('left join ' . $prefix . 'type on ' . $prefix . 'article.typeid=' . $prefix . 'type.typeid')->where($map)->field("aid,title,addtime," . $prefix . "article.typeid as typeid,typename")->limit($p->firstRow . ',' . $p->listRows)->order("addtime desc")->select();
        //echo $article->getLastSql(); 验证sql
        //封装变量
        $this->assign('list', $list);
        $this->assign('num', $count);
        $this->assign('page', $p->show());
        $this->assign('keyword', $keyword);
        //模板输出
        $this->display(TMPL_PATH . cookie('think_template') . '/search.html');
    }

    //调查模块
    private function vote($isvote)
    {
        $vote = M('vote');
        $vo = $vote->where('id=' . intval($isvote))->find();
        if ($vo) {
            $strs = explode("\n", trim($vo['vote']));
            for ($i = 0; $i < count($strs); $i++) {
                $s = explode("=", $strs[$i]);
                $data[$i]['num'] = $s[1];
                $data[$i]['title'] = $s[0];
            }
        } else {
            $vo['title'] = '投票ID不存在!请检查网站配置!';
        }
        $this->assign('vtype', $vo['stype']);
        $this->assign('vid', $isvote);
        $this->assign('vtitle', $vo['title']);
        $this->assign('vdata', $data);
    }

    //申请友链
    public function reglink()
    {
        $this->display(TMPL_PATH . cookie('think_template') . '/reglink.html');
    }

    public function doreglink()
    {
        header("Content-type: text/html; charset=utf-8");
        $link = M('link');
        if (C('TOKEN_ON') && !$link->autoCheckToken($_POST)) {
            $this->error(L('_TOKEN_ERROR_'));
        }
        $data['title'] = remove_xss(htmlentities($_POST['Title']));
        $data['url'] = remove_xss(htmlentities($_POST['LinkUrl']));
        $data['logo'] = remove_xss(htmlentities($_POST['LogoUrl']));
        $data['status'] = 0;
        $data['rank'] = 10;
        if ($link->add($data)) {
            echo "<br/><br/><br/><font color=red>添加成功，等待审核！请在贵站加上本站链接。</font>";
        } else {
            echo "<br/><br/><br/><font color=red>添加失败,请联系管理员!</font>";
        }

    }
}
?>