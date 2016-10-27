<?php 
	header("Content-Type:text/html;charset=utf-8");
	
//PDO连接MySQL
	$dsn = "mysql:dbname=msystem;host=127.0.0.1";

	$user = "root";

	$password = "";

	try{
		$dbh = new PDO($dsn,$user,$password);
		// $dbh = new PDO('xishuoPHP/dbcontent.txt',$user,$password);	q
		echo "<br/>连接成功!<br/>";
	}catch(PDOException $e){
		echo '数据库连接失败！：'.$e->getMessage();
	}

//PDO预处理sql命令
	
	//①							//好使
	// $query = 'insert into table1(uid,name)values(:uid,:name);';

	// $stmt = $dbh->prepare($query);
	
	// $stmt->bindParam(':uid',$uid);
	// $stmt->bindParam(':name',$name);  
	// $uid = "3234";
	// $name = "社会修宇哥!";
	// $stmt->execute();

	//②

	// $query = 'insert into table1(uid,name)values(?,?);';
	// $stmt = $dbh->prepare($query);
	// $stmt->bindParam(1,$uid,PDO::PARAM_STR);
	// $stmt->bindParam(2,$name,PDO::PARAM_STR);
	// $uid = "111";
	// $name = "这是?传来的!";
	// $stmt->execute();



	echo '<table border="1" align="center" width=90%>';
	echo '<caption><h1>信息人联系表</h1></caption>';
	echo '<tr bgcolor="#cccccc">';
	echo '<th>UID</th><th>name</th>';

	$stmt = $dbh->query("select id,name from zxy_information;");

	var_dump($stmt->fetchAll(PDO::FETCH_NUM));
	die();

	while (list($id,$name) = $stmt->fetch(PDO::FETCH_NUM)) {
		echo '<tr>';
		echo '<td>'.$id.'</td>';
		echo '<td>'.$name.'</td>';
		echo '</tr>';  
	}

	echo "</table>";
 ?>