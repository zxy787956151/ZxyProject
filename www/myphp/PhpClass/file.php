<?php 
	include('base.php');

	$myfile = fopen("testfile.txt", "a");

	$txt = "zxy\n";

	fwrite($myfile, $txt);

	fclose($myfile);
 ?>