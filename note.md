# Php基础知识学习
## 变量
```php
//查看类型
gettype($age);

//查看数据类型和值
var_dump($name);

//判断是否属于某类型
is_bool($sex);

//强制类型转换
(string)$age;

//永久类型转换
settype($age,string);

//将数据转为整形
intval('123');

//将数据转为浮点型
floatval('123.12');

//单引号创建字符,字符串中含有的html标签会被浏览器解析
$str1='<h2>hello<h2>';

//双引号来创建字符串，可以解析变量以及所以转义字符,单引号则不可
$str2="he\r\nllo{$age}";

//heredoc语法结构来创建字符串,与双引号字符串一致,可以解析变量以及所以转义字符
//输入大段html代码，推荐使用此结构
$str3=<<<"EOT"
<p>hah{$age}aha</p>
EOT;

//nowdoc语法结构，相当于单引号字符串
$str4=<<<'EOD'
    hello world
EOD;
```
# 数组
> 数组就是键值对的有序集合
```php
//以下3种数组创建内容相等，都为索引数组
$arr1=array(10,20,30);//会默认的分配键，从0开始
$arr2=array(0=>10, 1=>20, 2=>30);
$arr3=[10,20,30];//推荐使用此方式（新）

//关联数组，键都是字符串，如果不是数字或字符串，会进行强制类型转换
$arr=[
    'id'=>19,
    'name'=>'tom',
    'sex'=>'man'
];

//php中键可以是数字或者字符串
$arr=[
    1=>19,
    'name'=>'tom',
    2=>'man'
];
print_r($arr);
```
## 数组的增删改查操作
> 数组的新增和访问
```php
$obj=new StdClass();//创建一个标准对象
$obj->name='jack';//给对象新增一个属性并赋值

//数组中的值可以是任意值
$arr=[
    'name'=>'tom',
    'age'=>20,
    'language'=>['html','css','java'],
    'user'=>$obj
];

print_r($arr);

//用vardump显示的信息更加完整，访问数组元素可以用方括号和花括号
var_dump($arr['name']);
var_dump($arr{'name'});

print_r($arr['language'][0]);//访问数组中的数组，二维数组
print_r($arr['user']->name);//访问数组中的对象的属性
```
> 数组元素的添加与更新
```php
$arr=['html','css','js'];

$arr[]='php';//不指定键名则追加
$arr[2]='php';//键名存在则更新
$arr[6]='php';//键名不存在则创建
```
> 数组元素的删除操作
```php
$arr=[
    'name'=>'tom',
    'age'=>20,
    'language'=>['html','css','java'],
];
//删除数组中的某元素
unset($arr['age']);
print_r($arr);

//清空数组中的元素，但不删除数组
foreach ($arr as $key => $value) {
    unset($arr[$key]);
}
print_r($arr);
```
## 数组元素重建索引
```php
$arr=[10,20,30,40,50];
unset($arr[3]);
//针对索引数组，数组删除某个元素后，索引不会自动排列
print_r($arr);

//调用此方法，重新排列数组中的索引
$newArr=array_values($arr);
print_r($newArr);
```
## 数组遍历
```php
$arr=[10,20,30,40,50];
//将数组元素键值分别复制$key和$value
foreach ($arr as $key => $value) {
    unset($arr[$key]);
}
print_r($arr);
```
