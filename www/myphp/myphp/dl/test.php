

<?php

$dbms='mysql';                         //数据库类型 ,对于开发者来说，使用不同的数据库，只要改这个，不用记住那么多的函数

$host='localhost';                     //数据库主机名

$dbName='db_database19';            //使用的数据库

$user='root';                          //数据库连接用户名

$pass='root';                          //对应的密码

$dsn="$dbms:host=$host;dbname=$dbName";

try {

$pdo = new PDO($dsn, $user, $pass);     //初始化一个PDO对象，就是创建了数据库连接对象$pdo

$query="select * from tb_pdo_mysql";    //定义SQL语句

$result=$pdo->prepare($query);            //准备查询语句

$result->execute();                        //执行查询语句，并返回结果集

while($res=$result->fetch(PDO::FETCH_ASSOC)){        //while循环输出查询结果集，并且设置结果集的为关联索引

?>      

<tr>

<td height="22" align="center" valign="middle"><?php echo $res['id'];?></td>

<td align="center" valign="middle"><?php echo $res['pdo_type'];?></td>

<td align="center" valign="middle"><?php echo $res['database_name'];?></td>

<td align="center" valign="middle"><?php echo $res['dates'];?></td>

<td align="center" valign="middle"><a href="javascript:del(<?php echo $res['id']?>)">删除</a></td>

</tr>

<?php 

}

} catch (PDOException $e) {

die ("Error!: " . $e->getMessage() . "<br/>");

}

?>

