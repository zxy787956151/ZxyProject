<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
    
	@function 栏目无限分类 Model

    @Filename TypeModel.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-17 15:20:12 $
*************************************************************/
class TypeModel extends Model
{
	protected $_auto = array(
		array('path','tclm',3,'callback'),		
	);
	
	function tclm()
	{
		if(!isset($_POST['fid']) or empty($_POST['fid']))
		{
			$path = 0;
		}
		else
		{
			$fid = $_POST['fid'];
			$a = $this->where('typeid='.$fid)->field('path,typeid')->find();
			if($a)
			{
				$path = $a['path'].'-'.$a['typeid'];
			}
			else
			{
				$path ='0';
			}
		}
		//修改时注意将自身的子孙path也修改下
		if(isset($_POST['typeid']) && intval($_POST['typeid'])>0){
		$typeid = intval($_POST['typeid']);
		$substr = get_children($typeid,0);
		if($substr !=''){
		$old_path = $this->where('typeid='.$typeid)->getField('path');
		$new_str = 'replace(`path`,\''.$old_path.'-'.$typeid.'\',\''.$path.'-'.$typeid.'\')';
		$sql = "UPDATE `".C('DB_PREFIX')."type` SET `path`=".$new_str." WHERE typeid in(".$substr.")";
		M()->query($sql);
		}
		}
		return $path;
	}
}
?>