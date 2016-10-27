<?php
// echo 1111;
	/**
	 * 关联模型
	 */
	Class BlogRelationModel extends RelationModel {
		//定义表名
		Protected $tableName = 'blog'; 

		//定义你要关联哪些表
		Protected $_link = array(
			'attr' => array(
				'mapping_type' => MANY_TO_MANY ,	//什么关系(多对多)
				'mapping_name' =>'attr',//指定你要关联的这个表的名2
				'foreign_key' => 'bid' ,	//关联键
				'relation_foreign_key' => 'aid' ,	//用什么来保存blog表的id
				'' => 'hd_blog_attr',		//中间表的名称
				),

			'cate' => array(
				'mapping_type' => BELONGS_TO,
				//MANY_TO_MANY:多对多, HAS_ONE:一对一,HAS_MANY:一对多,
				//"多"和"一"关联:BELONGS_TO
				'foreign_key' =>  'cid',//用哪个字段保存"多"
				'mapping_fields' => 'name',//cate只读取name,读取全部用*
				'as_fields' => 'name:cate'
				//把cate数组里的name元素放到外面数组作为一个元素(":"防止重名)
				)
			);
	}
?>