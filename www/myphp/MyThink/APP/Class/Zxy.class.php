<?php 
	Class Zxy{
		Static Public function fileRename($dir,$srcExtension,$desExtension){
						 if(!is_dir($dir)){
						  echo "{$dir}不是一个有效的目录!n";
						  exit();  
						  }
						 $handler = opendir($dir);
						 //列出$dir目录中的所有文件
						 while(($fileName = readdir($handler))!=false){
						  if($fileName!='.'&&$fileName!='..'){
						   //'.' 和 '..'是分别指向当前目录和上级目录
						   $curDir = $dir.'/'.$fileName;
						   if(is_dir($curDir)){
						    //如果是目录，则递归下去
						    fileRename($curDir,$srcExtension,$desExtension);
						    }
						    else{
						     //获取文件路径的信息
						     $path = pathinfo($curDir);
						     //print_r($path);
						     if($path['extension']==$srcExtension){  
						      $newname = $path['dirname'].'/'
						      ."logo".".".$desExtension;
						      rename($curDir,$newname);   
						      // echo $curDir.'-->'.$newname."n";   
						      }
						      else{
						      	$desExtension = 'png';
						      $newname = $path['dirname'].'/'
						      ."logo".".".$desExtension;
						       rename($curDir,$newname); 
						      }
						     }
						   }
						  }
 						}


 		Static Public function deleteFile($dirName){
 			
				 if(is_dir($dirName)){
			        echo "<br /> ";
			        if ( $handle = opendir( "$dirName" ) ) {  
			          while ( false !== ( $item = readdir( $handle ) ) ) {  
			              if ( $item != "." && $item != ".." ) {  
			                  if ( is_dir( "$dirName/$item" ) ) {  
			                      del_DirAndFile( "$dirName/$item" );  
			                  } else {  
			                      // if( unlink( "$dirName/$item" ) )echo "已删除文件: $dirName/$item<br /> ";  
			                  }  
			              }  
			          }  
			      	 closedir( $handle );  
				        }
				    }
 		}
	}
 ?>