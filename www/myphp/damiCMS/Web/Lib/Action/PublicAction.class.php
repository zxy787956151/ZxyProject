<?php

/***********************************************************
 * [大米CMS] (C)2011 - 2012 damicms.com
 *
 * @function 前台公共    Action
 *
 * @Filename PublicAction.class.php $
 *
 * @Author 追影 QQ:279197963 $
 *
 * @Date 2011-11-21 08:24:19 $
 *************************************************************/
class PublicAction extends Action
{
    Public function _empty()
    {
        alert('方法不存在', 3);
    }

    public function head()
    {
        //读取数据库和缓存
        $type = M('type');
        $article = M('article');
        $config = F('basic', '', './Web/Conf/');
        //封装网站配置
        $this->assign('config', $config);
        $this->assign('keywords', $config['sitekeywords']);
        $this->assign('description', $config['sitedescription']);
        if (cookie('think_template') == 'xinwen') {
            //滚动公告
            $data['status'] = 1;
            $data['typeid'] = $config['noticeid'];
            $roll = $article->where($data)->field('aid,title')->order('addtime desc')->limit($config['rollnum'])->select();
            //处理标题:防止标题过长撑乱页面
            foreach ($roll as $k => $v) {
                $roll[$k]['title'] = msubstr($v['title'], 0, 20, 'utf-8');
            }
            $this->assign('roll', $roll);
        }
        //网站导航
        $menu = $type->where('ismenu=1')->order('drank asc')->select();
        foreach ($menu as $k => $v) {
            $menuson[$k] = $type->where('fid=' . $v['typeid'] . ' AND drank <> 0')->order('drank asc')->select();
            $menu[$k]['submenu'] = $menuson[$k];
        }
        $this->assign('menuson', $menuson);
        $this->assign('menu', $menu);
        //位置导航
        $nav = '<a href="' . $config['siteurl'] . '">首页</a>';
        if (isset($_GET['aid'])) {
            $typeid = $article->where('aid=' . intval($_GET['aid']))->getField('typeid');
        } else {
            $typeid = intval($_GET['typeid']);
        }
        $typename = $type->where('typeid=' . $typeid)->getField('typename');
        $path = $type->where('typeid=' . $typeid)->getField('path');
        $typelist = explode('-', $path);
        //拼装导航栏字符串
        foreach ($typelist as $v) {
            if ($v == 0) continue;
            $s = $type->where('typeid=' . $v)->getField('typename');
            $nav .= "&nbsp;&gt;&nbsp;<a href=\"" . U('lists/' . $v) . "\">{$s}</a>";
        }
        $nav .= "&nbsp;&gt;&nbsp;<a href=\"" . U('lists/' . $typeid) . "\">{$typename}</a>";
        $this->assign('nav', $nav);
        //释放内存
        unset($type, $article);
        $this->assign('head', TMPL_PATH . cookie('think_template') . '/head.html');
        $this->assign('footer', TMPL_PATH . cookie('think_template') . '/footer.html');
    }

    function py_link()
    {
        $link = M('link')->where('islogo=1')->order('rank')->limit(5)->select();
        $this->assign('mylink', $link);
    }

    function single()
    {
        self::head();
        $sinfo = M('article')->where('aid=' . intval($_GET[aid]))->find();
        if ($sinfo) {
            $this->assign('title', $sinfo['title']);
            $this->assign('sinfo', $sinfo);
        }
        $this->display();
    }

//RSS订阅
    function rss()
    {
        import('ORG.Util.Rss');
        $myRss = new RSS("大米CMS", C('SERVER_URL'), "大米CMS");
        $list = M('article')->where('1=1')->select();
        foreach ($list as $k => $v) {
            $myRss->AddItem($v['title'], 'http://' . $_SERVER['SERVER_NAME'] . url('articles', $v['aid']), $v['addtime']);
        }
        $myRss->BuildRSS();
        $myRss->SaveToFile('./feed.rss');
        $myRss->getFile('./feed.rss');
    }

//自动更新描述
    function up_desc()
    {
        $list = M('article')->where("description=''")->select();
        foreach ($list as $k => $v) {
            M('article')->where('aid=' . $v['aid'])->setField('description', msubstr(strip_tags($v['content']), 0, 100));
        }
        echo '成功';
    }

//在线充值或在线订单处理
    function shouquan()
    {
        $ap_path = (intval(C('AP_TYPE')) == 1 ? 'ap_jishi' : 'ap_danbao');
        require_once("./Trade/{$ap_path}/alipay.config.php");
        require_once("./Trade/{$ap_path}/lib/alipay_notify.class.php");
//计算得出通知验证结果
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();

        if ($verify_result) {//验证成功

            //商户订单号WIDout_trade_no

            $out_trade_no = $_POST['out_trade_no'];

            //支付宝交易号

            $trade_no = $_POST['trade_no'];

            //交易状态
            $trade_status = $_POST['trade_status'];

            $total_fee = $_POST['total_fee'];
            if ($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
                //该判断表示买家已在支付宝交易管理中产生了交易记录，但没有付款

                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序

                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 0);
                logResult('等待买家付款!');
                echo "success";        //请不要修改或删除
            } else if ($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
                //该判断表示买家已在支付宝交易管理中产生了交易记录且付款成功，但卖家没有发货
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 1);
                logResult('已付款，等待发货!');
                echo "success";        //请不要修改或删除


                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            } else if ($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
                //该判断表示卖家已经发了货，但买家还没有做确认收货的操作

                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 2);
                logResult('已发货,等待收货!');
                echo "success";        //请不要修改或删除

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            } else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                $tlog = M('trade_log');
                $tdail = $tlog->where("taobao_no='{$trade_no}'")->find();
                if (!$tdail) {
                    M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 3);
                    $trade_type = substr($out_trade_no, 0, 2);
                    if ($trade_type == "CZ") {
                        $arr = explode("-", $out_trade_no);
                        if (count($arr) == 2) {
                            $uid = intval($arr[1]);
                            if ($uid > 0) {
                                M('member')->where('id=' . $uid)->setInc('money', $total_fee);
                                //logResult(M('dami_common_member',null)->getLastSql().'<BR>');
                                $data['uid'] = $uid;
                                $data['addtime'] = time();
                                $data['price'] = $total_fee;
                                $data['trade_no'] = $out_trade_no;
                                $data['remark'] = "用户充值";
                                $data['log_type'] = 0;
                                M('money_log')->add($data);
                                //logResult(M('money_log')->getLastSql().'<BR>');
                            }
                        }
                    }
                    $taobao_arr['taobao_no'] = $trade_no;
                    $taobao_arr['trade_no'] = $out_trade_no;
                    $taobao_arr['uid'] = $uid;
                    $taobao_arr['money'] = $total_fee;
                    $taobao_arr['addtime'] = date('Y-m-d H:i:s');
                    $tlog->add($taobao_arr);
                }
            } //退款退货相关
            else if ($_POST['refund_status'] == 'WAIT_SELLER_AGREE') {
                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 7);
            } else if ($_POST['refund_status'] == 'WAIT_BUYER_RETURN_GOODS') {
                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 8);
            } else if ($_POST['refund_status'] == 'REFUND_SUCCESS') {
                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 9);

            } else if ($_POST['trade_status'] == 'TRADE_CLOSED') {
                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 10);
            } else {
                logResult($out_trade_no . '<BR>');
            }
        } else {
            //验证失败
            logResult('验证失败<BR>');
            echo "fail";

            //调试用，写文本函数记录程序运行情况是否正常
            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
        }
    }

//微信支付异步处理
    function wxnotify()
    {
        require_once "./Trade/Wxpay/lib/WxPay.Api.php";
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        //这里没有去做回调的判断，可以参考手机做一个判断。
        try {
            $xmlObj = (object)WxPayResults::Init($xml);//这里微信默认返回的数组本人喜欢object
            //$xmlObj= simplexml_load_string($xml); //解析回调数据
            $appid = $xmlObj->appid;//微信appid
            $mch_id = $xmlObj->mch_id;  //商户号
            $nonce_str = $xmlObj->nonce_str;//随机字符串
            $sign = $xmlObj->sign;//签名
            $result_code = $xmlObj->result_code;//业务结果
            $openid = $xmlObj->openid;//用户标识
            $is_subscribe = $xmlObj->is_subscribe;//是否关注公众帐号
            $trace_type = $xmlObj->trade_type;//交易类型，JSAPI,NATIVE,APP
            $bank_type = $xmlObj->bank_type;//付款银行，银行类型采用字符串类型的银行标识。
            $total_fee = (float)round(intval($xmlObj->total_fee) / 100, 2);//订单总金额，单位为分
            $fee_type = $xmlObj->fee_type;//货币类型，符合ISO4217的标准三位字母代码，默认为人民币：CNY。
            $transaction_id = $xmlObj->transaction_id;//微信支付订单号
            $out_trade_no = $xmlObj->out_trade_no;//商户订单号
            $attach = $xmlObj->attach;//商家数据包，原样返回
            $time_end = $xmlObj->time_end;//支付完成时间
            $time_end = $xmlObj->time_end;//支付完成时间
            $time_end = $xmlObj->time_end;//支付完成时间
            $cash_fee = $xmlObj->cash_fee;
            $return_code = $xmlObj->return_code;
            //下面开始你可以把回调的数据存入数据库，或者和你的支付前生成的订单进行对应了。
            //需要记住一点，就是最后在输出一个success.要不然微信会一直发送回调包的，只有需出了succcess微信才确认已接收到信息不会再发包.
            $tlog = M('trade_log');
            $tdail = $tlog->where("taobao_no='{$transaction_id}'")->find();
            if (!$tdail) {
                M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status', 3);
                $trade_type = substr($out_trade_no, 0, 2);
                if ($trade_type == "CZ") {
                    $arr = explode("-", $out_trade_no);
                    if (count($arr) == 2) {
                        $uid = intval($arr[1]);
                        if ($uid > 0) {
                            M('member')->where('id=' . $uid)->setInc('money', $total_fee);
                            //logResult(M('dami_common_member',null)->getLastSql().'<BR>');
                            $data['uid'] = $uid;
                            $data['addtime'] = time();
                            $data['price'] = $total_fee;
                            $data['trade_no'] = $out_trade_no;
                            $data['remark'] = "用户充值";
                            $data['log_type'] = 0;
                            M('money_log')->add($data);
                            //logResult(M('money_log')->getLastSql().'<BR>');
                        }
                    }
                }
                $taobao_arr['taobao_no'] = $transaction_id;
                $taobao_arr['trade_no'] = $out_trade_no;
                $taobao_arr['uid'] = $uid;
                $taobao_arr['money'] = $total_fee;
                $taobao_arr['addtime'] = date('Y-m-d H:i:s');
                $tlog->add($taobao_arr);
            }
            echo "SUCCESS";        //请不要修改或删除
        } catch (WxPayException $e) {
            echo "FAIL";

        }
    }

//ajax加入购物车
    function ajax_insert_cart()
    {
        if (empty($_REQUEST['id']) || empty($_REQUEST['qty']) || empty($_REQUEST['price']) || empty($_REQUEST['name']) || !is_numeric($_REQUEST['price']) || !is_numeric($_REQUEST['qty']) || !is_numeric($_REQUEST['id']) || intval($_REQUEST['qty']) <= 0) {
            $this->ajaxReturn('参数错误', '失败', 0);
            exit();
        }
        import('ORG.Util.Cart');
        $items = array(
            array(
                'id' => time(),
                'qty' => (int)$_REQUEST['qty'],
                'price' => $_REQUEST['price'],
                'name' => $_REQUEST['name'],
                'option' => array('gid'=> intval($_REQUEST['id']),'gtype' => (string)$_REQUEST['gtype'], 'pic' => (string)$_REQUEST['pic']),
            ),
        );
        $cart = new Cart();
        $cart->insert($items);
        $this->ajaxReturn($cart->contents(), '成功', 1);
    }

//ajax购物车物品列表
    function ajax_cart_list()
    {
        import('ORG.Util.Cart');
        $cart = new Cart();
        $this->ajaxReturn($cart->contents(), '成功', 1);
    }

//将物品从购物车中删除
    function ajax_del_cart()
    {
        import('ORG.Util.Cart');
        $id = intval($_REQUEST['id']);
        $cart = new Cart();
        $arr = array(
            'rowid' => md5($id),
            'qty' => 0//清楚该物品只要设置为0即可
        );
        $cart->update($arr);
    }
//结束
}
?>