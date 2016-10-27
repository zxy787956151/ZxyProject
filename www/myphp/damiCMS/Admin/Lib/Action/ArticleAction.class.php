<?php

/***********************************************************
 * [大米CMS] (C)2011 - 2011 damicms.com
 *
 * @function 文章管理
 *
 * @Filename ArticleAction.class.php $
 *
 * @Author 追影 QQ:279197963 $
 *
 * @Date 2011-11-27 08:52:44 $
 *************************************************************/
class ArticleAction extends CommonAction
{
    public function index()
    {
        R('Public/type_tree');
        $article = D('ArticleView');
        import('ORG.Util.Page');
        $condtion = '1=1';
        if (isset($_REQUEST['typeid']) && intval($_REQUEST['typeid']) != 0) {
            $typeid = intval($_REQUEST['typeid']);
        } else if (cookie('curr_typeid') != '') {
            $typeid = intval(cookie('curr_typeid'));
        }
        if ($typeid > 0) {
            $is_last = 0;
            //这里其实不完善没有查找子类的文章
            $arr = get_children($typeid);
            $condtion .= ' and article.typeid in(' . $arr . ')';
            //判定是否为最底层栏目

            $t_num = M('type')->where('islink=0 and fid=' . $typeid)->count();
            if ($t_num == 0) {
                $is_last = 1;
            } else {
                $fid = M('type')->where('islink=0 and typeid=' . $typeid)->getField('fid');
                if ($fid > 0 && $t_num > 0) {
                    $is_last = 1;
                }
            }
            if ($is_last == 1) {
                $this->assign('is_last', '1');
                cookie('curr_typeid', $typeid);
            }
        }

        //权限
        if (!$_SESSION[C('ADMIN_AUTH_KEY')] && $_SESSION[C('USER_CONTENT_KEY')] != '') {
            $condtion .= ' and article.typeid in(' . $_SESSION[C('USER_CONTENT_KEY')] . ')';
        }

        if (isset($_GET['status'])) {
            $condtion .= ' and status=' . $_GET['status'];
        }
        if (isset($_GET['istop'])) {
            $condtion .= ' and istop=' . $_GET['istop'];
        }
        if (isset($_GET['ishot'])) {
            $condtion .= ' and ishot=' . $_GET['ishot'];
        }
        if (isset($_GET['isflash'])) {
            $condtion .= ' and isflash=' . $_GET['isflash'];
        }
        if (isset($_GET['isimg'])) {
            $condtion .= ' and isimg=' . $_GET['isimg'];
        }
        if (isset($_GET['islink'])) {
            $condtion .= ' and islink=' . $_GET['islink'];
        }
        if (isset($_GET['hits'])) {
            $order = 'hits desc';
        } else {
            $order = 'addtime desc';
        }
        $count = $article->where($condtion)->count();
        $p = new Page($count, 20);
        $list = $article->where($condtion)->order($order)->limit($p->firstRow . ',' . $p->listRows)->select();
        //echo 	$article->getLastSql();
        $p->setConfig('prev', '上一页');
        $p->setConfig('header', '篇文章');
        $p->setConfig('first', '首 页');
        $p->setConfig('last', '末 页');
        $p->setConfig('next', '下一页');
        $p->setConfig('theme', "%first%%upPage%%linkPage%%downPage%%end%
		<li><span><select name='select' onChange='javascript:window.location.href=(this.options[this.selectedIndex].value);'>%allPage%</select></span></li>\n<li><span>共<font color='#009900'><b>%totalRow%</b></font>篇文章 20篇/每页</span></li>");
        $this->assign('page', $p->show());
        $this->assign('list', $list);
        $this->moveop();//文章编辑option
        $this->jumpop();//快速跳转option
        $this->urlmode();
        $this->display('index');
    }

    public function add()
    {
        if (!isset($_REQUEST['typeid']) || $_REQUEST['typeid'] == '0') {
            $this->error('请先选择您要添加文章的栏目!');
            exit();
        }
        $typeid = intval($_REQUEST['typeid']);
        //默认显示字段
        $str = "1|1|1|1|1|1|0|0|1|1|1|1|1|1|0|0";
        $olist = M('type')->where("show_fields<>'' and typeid=" . $typeid)->find();
        if ($olist) {
            $str = $olist['show_fields'];
        }
        $arr = explode('|', $str);
        $this->assign('arr', $arr);
        $this->addop();//文章编辑option
        $this->jumpop();//快速跳转option
        $this->vote(0);
        //加载扩展字段	
        $extend_field = list_extend_field($typeid);
        $this->assign('extend_field', $extend_field);
        $this->display('add');
    }

    public function edit()
    {
        $type = M('article');
        $list = $type->where('aid=' . $_GET['aid'])->find();
        $typeid = $list['typeid'];
        $str = "1|1|1|1|1|1|0|0|1|1|1|1|1|1|0|0";
        $olist = M('type')->where("show_fields<>'' and typeid=" . $typeid)->find();
        if ($olist) {
            $str = $olist['show_fields'];
        }
        $arr = explode('|', $str);
        $this->assign('arr', $arr);
        $this->assign('list', $list);
        $this->editop();//文章编辑option
        $this->jumpop();//快速跳转option
        $this->vote($list['voteid']);
        //加载扩展字段	
        $extend_field = list_extend_field($typeid);
        $this->assign('extend_field', $extend_field);
        $this->display();
    }


    public function doedit()
    {
        if (empty($_POST['title'])) {
            $this->error('标题不能为空!');
        }
        if (empty($_POST['typeid'])) {
            $this->error('请选择栏目!');
        }
        if (isset($_POST['linkurl'])) {
            $data['linkurl'] = trim($_POST['linkurl']);
        }
        if (isset($_POST['imgurl'])) {
            $data['imgurl'] = trim($_POST['imgurl']);
        }
        if (!empty($_POST['TitleFontColor'])) {
            $data['titlecolor'] = trim($_POST['TitleFontColor']);
        }
        $data['aid'] = $_POST['aid'];
        $data['voteid'] = $_POST['voteid'];
        $data['pagenum'] = $_POST['pagenum'];
        $data['content'] = $_POST['content'];
        $data['title'] = trim($_POST['title']);
        $data['hits'] = trim($_POST['hits']);
        $data['typeid'] = trim($_POST['typeid']);
        empty($_POST['addtime']) ? $data['addtime'] = date('Y-m-d H:i:s') : $data['addtime'] = trim($_POST['addtime']);
        empty($_POST['author']) ? $data['author'] = '未知' : $data['author'] = trim($_POST['author']);
        empty($_POST['keywords']) ? $data['keywords'] = '' : $data['keywords'] = trim($_POST['keywords']);
        empty($_POST['description']) ? $data['description'] = '' : $data['description'] = trim($_POST['description']);
        empty($_POST['copyfrom']) ? $data['copyfrom'] = '' : $data['copyfrom'] = trim($_POST['copyfrom']);
        empty($_POST['islink']) ? $data['islink'] = '0' : $data['islink'] = trim($_POST['islink']);
        empty($_POST['istop']) ? $data['istop'] = '0' : $data['istop'] = trim($_POST['istop']);
        empty($_POST['isimg']) ? $data['isimg'] = '0' : $data['isimg'] = trim($_POST['isimg']);
        empty($_POST['ishot']) ? $data['ishot'] = '0' : $data['ishot'] = trim($_POST['ishot']);
        empty($_POST['isflash']) ? $data['isflash'] = '0' : $data['isflash'] = trim($_POST['isflash']);
        //过滤掉[dami_page]
        $notes = str_replace("[dami_page]", "", $_POST['content']);
        empty($_POST['note']) ? $data['note'] = trim(strip_tags(msubstr($notes, 0, 130, 'utf-8', false))) . '...' : $data['note'] = $_POST['note'];
        //扩展字段数据
        $list_extend = list_extend_field(intval($_POST['typeid']));
        foreach ($list_extend as $k => $v) {
            if (isset($_POST[$v['field_name']])) {
                if (is_array($_POST[$v['field_name']])) {
                    $data[$v['field_name']] = trim(join(',', $_POST[$v['field_name']]));
                } else {
                    $data[$v['field_name']] = trim($_POST[$v['field_name']]);
                }
            }
        }
        $article = M('article');
        if ($article->save($data)) {
            //echo $article->getLastSql;
            $this->assign("jumpUrl", U('Article/index'));
            $this->success('操作成功!');
            exit();
        }
        $this->error('操作失败!');
    }


    public function doadd()
    {
        //验证
        if (empty($_POST['typeid'])) {
            $this->error('请选择栏目!');
        }

        if (isset($_POST['linkurl'])) {
            $data['linkurl'] = trim($_POST['linkurl']);
        }
        if (isset($_POST['imgurl'])) {
            $data['imgurl'] = trim($_POST['imgurl']);
        }
        if (!empty($_POST['TitleFontColor'])) {
            $data['titlecolor'] = trim($_POST['TitleFontColor']);
        }
        $data['status'] = 1;
        if (isset($_POST['voteid'])) {
            $data['voteid'] = $_POST['voteid'];
        }
        if (isset($_POST['pagenum'])) {
            $data['pagenum'] = $_POST['pagenum'];
        }
        //使用stripslashes 反转义,防止服务器开启自动转义
        if (isset($_POST['content'])) {
            $data['content'] = $_POST['content'];
        }
        if (isset($_POST['title'])) {
            $data['title'] = trim($_POST['title']);
        }
        if (isset($_POST['hits'])) {
            $data['hits'] = trim($_POST['hits']);
        }
        if (isset($_POST['typeid'])) {
            $data['typeid'] = trim($_POST['typeid']);
        }
        empty($_POST['addtime']) ? $data['addtime'] = date('Y-m-d H:i:s') : $data['addtime'] = trim($_POST['addtime']);
        empty($_POST['author']) ? $data['author'] = '未知' : $data['author'] = trim($_POST['author']);
        empty($_POST['keywords']) ? $data['keywords'] = '' : $data['keywords'] = trim($_POST['keywords']);
        //自动提取介绍
        empty($_POST['description']) ? $data['description'] = '' : $data['description'] = trim($_POST['description']);
        empty($_POST['copyfrom']) ? $data['copyfrom'] = '' : $data['copyfrom'] = trim($_POST['copyfrom']);
        empty($_POST['islink']) ? $data['islink'] = '0' : $data['islink'] = trim($_POST['islink']);
        empty($_POST['istop']) ? $data['istop'] = '0' : $data['istop'] = trim($_POST['istop']);
        empty($_POST['isimg']) ? $data['isimg'] = '0' : $data['isimg'] = trim($_POST['isimg']);
        empty($_POST['ishot']) ? $data['ishot'] = '0' : $data['ishot'] = trim($_POST['ishot']);
        empty($_POST['isflash']) ? $data['isflash'] = '0' : $data['isflash'] = trim($_POST['isflash']);
        //过滤掉[dami_page]
        if (isset($_POST['content'])) {
            $notes = str_replace("[dami_page]", "", $_POST['content']);
            empty($_POST['note']) ? $data['note'] = trim(strip_tags(msubstr($notes, 0, 130, 'utf-8', false))) : $data['note'] = trim($_POST['note']);
        }
        //扩展字段数据
        $list_extend = list_extend_field(intval($_POST['typeid']));
        foreach ($list_extend as $k => $v) {
            if (isset($_POST[$v['field_name']])) {
                if (is_array($_POST[$v['field_name']])) {
                    $data[$v['field_name']] = trim(join(',', $_POST[$v['field_name']]));
                } else {
                    $data[$v['field_name']] = trim($_POST[$v['field_name']]);
                }
            }
        }
        $article = M('article');
        if ($article->add($data)) {
            $this->assign("waitSecond", 30);
            $this->assign("jumpUrl", U('Article/index'));
            $this->success('发布文章成功! 您可以<a href="' . U('Article/add', array('typeid' => intval($_POST['typeid']))) . '" style="color:green">继续发布</a>&nbsp;&nbsp;<a href="' . U('Article/index') . '" style="color:red">返回文章列表</a>');
        }
        $this->error('操作失败!');
    }


    public function del()
    {
        $article = D('article');
        if ($article->delete($_GET['aid'])) {
            $this->assign("jumpUrl", U('Article/index'));
            $this->success('操作成功!');
        }
        $this->error('操作失败!');
    }

    public function status()
    {
        $a = M('article');
        if ($_GET['status'] == 0) {
            $a->where('aid=' . $_GET['aid'])->setField('status', 1);
        } elseif ($_GET['status'] == 1) {
            $a->where('aid=' . $_GET['aid'])->setField('status', 0);
        } else {
            $this->error('非法操作');
        }
        $this->redirect('index');
    }


    public function delall()
    {
        $aid = $_REQUEST['aid'];  //获取文章aid
        $aids = implode(',', $aid);//批量获取aid
        $id = is_array($aid) ? $aids : $aid;
        $map['aid'] = array('in', $id);
        if (!$aid) {
            $this->error('请勾选记录!');
        }
        $article = D('article');

        if ($_REQUEST['Del'] == '更新时间') {
            $data['addtime'] = date('Y-m-d H:i:s');
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!', 1);
        }

        if ($_REQUEST['Del'] == '删除') {
            foreach ($aid as $v) {
                $article->delete($v);
            }
            $this->assign("jumpUrl", U('Article/index'));
            $this->success('操作成功!');
        }

        if ($_REQUEST['Del'] == '批量未审') {
            $data['status'] = 0;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '批量审核') {
            $data['status'] = 1;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '推荐') {
            $data['ishot'] = 1;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '解除推荐') {
            $data['ishot'] = 0;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '固顶') {
            $data['istop'] = 1;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '解除固顶') {
            $data['istop'] = 0;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '幻灯') {
            $data['isflash'] = 1;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '解除幻灯') {
            $data['isflash'] = 0;
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '移动') {
            if (intval($_REQUEST['typeid']) == 0) {
                $this->error('操作失败,请选择目标类别！');
            }
            $data['typeid'] = $_REQUEST['typeid'];
            if ($article->where($map)->save($data)) {
                $this->assign("jumpUrl", U('Article/index'));
                $this->success('移动成功!');
            }
            $this->error('操作失败!');
        }

        if ($_REQUEST['Del'] == '复制') {
            if (intval($_REQUEST['typeid']) == 0) {
                $this->error('操作失败,请选择目标类别！');
            }
            $list = $article->where($map)->select();
            foreach ($list as $k => $v) {
                $data = $v;
                $data['aid'] = NULL;
                $data['typeid'] = (int)$_REQUEST['typeid'];
                $article->add($data);
            }
            $this->success('复制成功!');
        }
    }

    //文章模块 批量移动option
    private function moveop()
    {
        $type = M('type');
        $where = '';
        if (!$_SESSION[C('ADMIN_AUTH_KEY')] && $_SESSION[C('USER_CONTENT_KEY')] != '') {
            $where = ('typeid in(' . $_SESSION[C('USER_CONTENT_KEY')] . ') and ');
        }
        $where .= '1=1';
        $oplist = $type->where($where)->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->group('bpath')->select();
        foreach ($oplist as $k => $v) {
            if ($v['fid'] == 0) {
                $count[$k] = '';
            } else {
                for ($i = 0; $i < count(explode('-', $v['bpath'])) * 2; $i++) {
                    $count[$k] .= '&nbsp;';
                }
            }
            $op .= "<option value=\"{$v['typeid']}\">{$count[$k]}|-{$v['typename']}</option>";
        }
        $this->assign('op2', $op);
    }

    //文章模块 快速跳转栏目option
    private function jumpop()
    {
        $type = M('type');
        $where = '';
        if (!$_SESSION[C('ADMIN_AUTH_KEY')] && $_SESSION[C('USER_CONTENT_KEY')] != '') {
            $where = ('typeid in(' . $_SESSION[C('USER_CONTENT_KEY')] . ') and ');
        }
        $where .= '1=1';
        $oplist = $type->where($where)->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->group('bpath')->select();
        //echo $type->getLastSql();
        foreach ($oplist as $k => $v) {
            $check = '';
            if (isset($_REQUEST['typeid'])) {
                if ($v['typeid'] == intval($_REQUEST['typeid'])) {
                    $check = 'selected="selected"';
                }
            } else if (cookie('curr_typeid') != '') {
                if ($v['typeid'] == intval(cookie('curr_typeid'))) {
                    $check = 'selected="selected"';
                }
            }
            if ($v['fid'] == 0) {
                $count[$k] = '';
            } else {
                for ($i = 0; $i < count(explode('-', $v['bpath'])) * 2; $i++) {
                    $count[$k] .= '&nbsp;';
                }
            }
            $op .= "<option value=\"" . U('Article/index?typeid=' . $v['typeid']) . "\" $check>{$count[$k]}|-{$v['typename']}</option>";
        }
        $this->assign('op', $op);
    }

    //文章模块 添加-栏目option
    private function addop()
    {
        $type = M('type');
        //获取栏目option
        $where = '';
        if (!$_SESSION[C('ADMIN_AUTH_KEY')] && $_SESSION[C('USER_CONTENT_KEY')] != '') {
            $where = ('typeid in(' . $_SESSION[C('USER_CONTENT_KEY')] . ') and ');
        }
        $where .= '1=1';
        $list = $type->where($where)->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->group('bpath')->select();
        foreach ($list as $k => $v) {

            $check = '';
            if (isset($_REQUEST['typeid'])) {
                if ($v['typeid'] == intval($_REQUEST['typeid'])) {
                    $check = 'selected="selected"';
                }
            }

            if ($v['fid'] == 0) {
                $count[$k] = '';
            } else {
                for ($i = 0; $i < count(explode('-', $v['bpath'])) * 2; $i++) {
                    $count[$k] .= '&nbsp;';
                }
            }
            $option .= "<option value=\"{$v['typeid']}\" $check>{$count[$k]}|-{$v['typename']}</option>";
        }
        $this->assign('option', $option);
    }

    //文章模块-编辑-栏目option
    private function editop()
    {
        $article = M('article');
        $a = $article->where('aid=' . $_GET['aid'])->field('typeid')->find();
        $type = M('type');
        $where = '';
        if (!$_SESSION[C('ADMIN_AUTH_KEY')] && $_SESSION[C('USER_CONTENT_KEY')] != '') {
            $where = ('typeid in(' . $_SESSION[C('USER_CONTENT_KEY')] . ') and ');
        }
        $where .= '1=1';
        $list = $type->where($where)->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->group('bpath')->select();
        foreach ($list as $k => $v) {
            if ($v['fid'] == 0) {
                $count[$k] = '';
            } else {
                for ($i = 0; $i < count(explode('-', $v['bpath'])) * 2; $i++) {
                    $count[$k] .= '&nbsp;';
                }
            }

            if ($v['typeid'] == $a['typeid']) {
                $option .= "<option value=\"{$v['typeid']}\" selected>{$count[$k]}|-{$v['typename']}</option>";
            } else {
                $option .= "<option value=\"{$v['typeid']}\">{$count[$k]}|-{$v['typename']}</option>";
            }
        }
        $this->assign('option', $option);
    }

    //投票模块:for add()
    private function vote($vid)
    {
        $vote = M('vote');
        $vo = $vote->where('status=1')->getField('id,title');
        if ($vid == 0) {
            $votehtml = '<option value=\"0\" selected>不投票</option>';
        } else {
            $votehtml = '<option value=\"0\">不投票</option>';
        }
        foreach ($vo as $k => $v) {
            if ($k == $vid) {
                $votehtml .= "<option value=\"{$k}\" selected>{$v}</option>";
            } else {
                $votehtml .= "<option value=\"{$k}\">{$v}</option>";
            }
        }
        $this->assign('votehtml', $votehtml);
        unset($votehtml);
    }

    //评论模块也调用此方法
    public function urlmode()
    {
        $config = F('basic', '', './Web/Conf/');
        switch ($config['urlmode']) {
            case 0:
                $urlmode = 'index.php/';
                break;
            case 1:
                $urlmode = '';
                break;
            case 2:
                $urlmode = 'index.php?s=';
        }
        switch ($config['suffix']) {
            case 0:
                $suffix = '.html';
                break;
            case 1:
                $suffix = '.htm';
                break;
            case 2:
                $suffix = '.shtml';
                break;
        }
        $this->assign('urlmode', $urlmode);
        $this->assign('suffix', $suffix);
        unset($config);
    }

    public function search()
    {
        $article = D('ArticleView');
        import('ORG.Util.Page');
        $map['title'] = array('like', '%' . $_POST['keywords'] . '%');
        $count = $article->where($map)->order('addtime desc')->count();
        $p = new Page($count, 20);
        $list = $article->where($map)->order('addtime desc')->limit($p->firstRow . ',' . $p->listRows)->select();
        $p->setConfig('prev', '上一页');
        $p->setConfig('header', '篇文章');
        $p->setConfig('first', '首 页');
        $p->setConfig('last', '末 页');
        $p->setConfig('next', '下一页');
        $p->setConfig('theme', "%first%%upPage%%linkPage%%downPage%%end%
		<li><span><select name='select' onChange='javascript:window.location.href=(this.options[this.selectedIndex].value);'>%allPage%</select></span></li>\n<li><span>共<font color='#009900'><b>%totalRow%</b></font>篇文章 20篇/每页</span></li>");
        $this->assign('page', $p->show());
        $this->assign('list', $list);
        $this->moveop();//文章编辑option
        $this->jumpop();//快速跳转option
        $this->urlmode();
        $this->display('index');
    }
}

?>