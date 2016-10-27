<?php 


	error_reporting(E_ALL);
	set_error_handler('pc_error_handler');

	function pc_error_handler($errno, $error, $file, $line, $content){
		$message = "[ERROR][$errno][$error][$file:$line]";

		print "$message";

		print_r(@$context);

		
	}

	$form = array('one', 'two');

	foreach ($form as $lizne) {
		$html.="<b>$line</b>";
	}
 ?>  