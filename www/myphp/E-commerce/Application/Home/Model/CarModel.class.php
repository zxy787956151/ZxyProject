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
                    $i++;
                }
            }
            return $pro;
        }
    }
?>