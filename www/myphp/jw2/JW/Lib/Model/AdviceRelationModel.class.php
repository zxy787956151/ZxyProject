<?php
   //前后台公用
   Class AdviceRelationModel extends RelationModel{
   	   //指定表名
   	   Protected  $tableName='advice';
   	   //指定关联的哪些表
   	   Protected $_link=array(
          'attr'=>array(
              'mapping_type'=>MANY_TO_MANY,
              'mapping_name'=>'attr',
              'foreign_key'=>'aid',
              //中间表里面哪个字段表示attr
              'relation_foreign_key'=>'bid',
              'relation_table'=>'jw_advice_attr'
          	),
          'cate'=>array(
              'mapping_type'=>BLONGS_TO,
              'foreign_key'=>'cid',
              //只读取name
              'mapping_fields'=>'name',
              //避免出现重名，用cate代替name
              'as_fields'=>'name:cate',
          )
   	   	);
       Public function getAdvice($type=0){
           //不读取del这个字段
           $field=array('del');
           //只读取没有放到回收站的
           $where=array('del'=>$type);
           return $this->field($field,true)->where($where)->relation(true)->select();
       }
   }
?>