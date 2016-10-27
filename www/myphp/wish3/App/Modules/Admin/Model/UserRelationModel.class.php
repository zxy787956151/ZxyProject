<?php
/**
 * 用户与角色 ※关联模型※
 */
	Class UserRelationModel extends RelationModel {
		//定义主表名称
		Protected $tableName = 'user';

		//定义关联关系(此为多对多!)
		Protected $_link = array(
				'role' => array(
					'mapping_type' => MANY_TO_MANY,//多对多关系
					//指定两表外键
					'foreign_key' => 'user_id',//主表在中间表中的字段名称
					'relation_key' => 'role_id',//副表在中间表中的字段名称
					
					'relation_table' => 'hd_role_user',//中间表名称
					//指定中间表,不指定默认排列为hd_user_role

					'mapping_fields' => 'id, name, remark'
					//定义只读取某些字段
					) 
			);

		// 关联模型实质上是发送了多条SQL,而视图模型只发送一条
	}
?>
<!-- 视图模型 <=> join语句: select * from hd_user u left join hd_role_user ru on u.id = ru.user_id left join hd_role r on ru.role_id = r.id\G
MySQL多表关联 -->