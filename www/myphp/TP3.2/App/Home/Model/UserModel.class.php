<?php 
// 只有在需要封装单独的业务逻辑的时候，模型类才是必须被定义的。
	namespace Home\Model;
	use Think\Model;
	//模型类的作用大多数情况是操作数据表的，如果按照系统的规范来命名模型类的话，大多数情况下是可以
	// 自动对应数据表
	Class UserModel extends Model{
		
		protected $dbName = 'newTp';

		protected $tableName = 'table1';
	}
 ?>