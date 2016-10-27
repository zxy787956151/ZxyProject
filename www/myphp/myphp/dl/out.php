<?php
	include("base.php");

	$_SESSION['user']="";
	$_SESSION['pwd']="";
	$out='1';
	header('Location:content.php?out=1');
?>