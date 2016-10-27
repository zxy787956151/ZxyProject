<?php
header('Content-Type:text/html;charset=utf-8');
$basedir = '.';
$auto = 1;
echo '清理Bom中...<br>';
checkdir($basedir);
echo '清理完毕!';
function checkdir($basedir){
if ($dh = opendir($basedir)) {
  while (($file = readdir($dh)) !== false) {
   if ($file != '.' && $file != '..'){
    if (!is_dir($basedir."/".$file)) {
     if(checkBOM("$basedir/$file")==1){
      echo "filename: $basedir/$file<font color=red>found bom and remove!</font><br>";
     }
    }else{
     $dirname = $basedir."/".$file;
     checkdir($dirname);
    }
   }
  }
closedir($dh);
}
}
function checkBOM ($filename) {
global $auto;
$contents = file_get_contents($filename);
$charset[1] = substr($contents, 0, 1);
$charset[2] = substr($contents, 1, 1);
$charset[3] = substr($contents, 2, 1);
if (ord($charset[1]) == 239 && ord($charset[2]) == 187 && ord($charset[3]) == 191) {
  if ($auto == 1) {
      $rest = substr($contents, 3);
      rewrite ($filename, $rest);
      return 1;
  } else {
      return 0;
  }
}
else return 0;
}
function rewrite ($filename, $data) {
    $filenum = fopen($filename, "w");
    flock($filenum, LOCK_EX);
    fwrite($filenum, $data);
    fclose($filenum);
}
