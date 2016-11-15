<?php
    namespace Home\Model;
    use Think\Model;
    include 'base.php';

    Class CarModel extends Model {
        Public function carList(){
            $where = array(
                'email' => $_SESSION['user'],
                'hid' => $huid['0']['id'],
                'pid' => $pid['0']['pid'],
            );

            $where1['email'] = $_SESSION['user'];
            $huid = M('homeuser')->where($where1)->field('id')->select();
            $where2['hid'] = $huid['0']['id'];
            $pid = M('car')->where($where2)->field('pid')->select();
            $i = 0;

            foreach ($pid as $k => $v){
                foreach ($v as $kk => $vv){
                    $pro["$i"] = M('product')->where("pid = $vv")->select();
                    $where3['pid'] = $pro["$i"]['0']['pid'];
                    $qua = M('car')->where($where3)->select();
                    foreach ($qua['0'] as $kkk => $vvv){
                        if ($kkk == 'id'){
                            $kkk = 'cid';
                        }
                        $pro["$i"]['0']["$kkk"] = $vvv;
                    }
                    $i++;
                }
            }                   //icar的id为cid
            return $pro;
        }

        Public function validate($str){
            //验证无错误 返回True
            switch ($str){
                case 'user':
                    $pd = !isset($_SESSION['user']) ? false : true;
                    break;
            }
            return $pd;
        }
    }
?>