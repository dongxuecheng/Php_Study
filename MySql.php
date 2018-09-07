<?php
/**
 * Created by PhpStorm.
 * User: dong
 * Date: 2018/9/7
 * Time: 13:27
 */
$servername = "localhost";
$username = "root";
$password = "";
//创建连接
@ $db = new mysqli($servername, $username, $password);//第四个参数可以指定连接的数据库的名字，可以不填
// 检测连接
if ($db->connect_error) {
    die("连接失败: " . $db->connect_error);//die函数输出一条消息，并退出当前脚本。该函数是 exit() 函数的别名。
}
echo "连接成功";
//创建数据库
$sql = "create database mydb";
//检测数据库是否创建成功
if ($db->query($sql) === true) {
    echo "数据库创建成功";
} else {
    echo "数据库创建失败" . $db->error;
}
//选择一个指定的数据库
if ($db->select_db("mydb") === true) {
    echo "数据库选择成功";
} else {
    echo "数据库创建失败" . $db->error;
}
//创建数据表
$sql = "create table mytable(
id int unsigned auto_increment primary key,
name varchar(10) not null,
age int not null
)";
if ($db->query($sql) === true) {
    echo "数据表创建成功";
} else {
    echo "数据表创建失败";
}
//插入数据
$sql ="insert into mytable value (1,'张三',23)";
if ($db->query($sql)===true){
    echo "成功插入数据";
}else {
    echo "数据插入失败".$db->error;
}
//预处理及绑定
$stmt=$db->prepare("insert into mytable value (?,?,?)");
$stmt->bind_param("isi",$id,$name,$age);

//设置参数执行
$id=1;
$name="tom";
$age=23;
$stmt->execute();

$id=2;
$name="jerry";
$age=43;
$stmt->execute();//可以多次绑定

$stmt->close();//关闭预处理

$sql="select * from mytable";
$result=$db->query($sql);
if($result->num_rows>0){//返回查询结果的行数
    while ($row=$result->fetch_object()){//将查询结果的每一行以一个对象返回，并且指针下移，类似于游标
        echo "姓名是".$row->name."--年龄是".$row->age."\n";
    }
}
$db->close();//断开数据库连接