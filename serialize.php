<?php
if(isset($_GET["del"]))
{
// удаляем куки
setcookie("Array", "", time()-3600);
// Перенаправление на страницу serialize.php
header("Location:serialize.php"); 
exit;
}
$copy = null;
if(isset($_COOKIE["Array"]))
{
	$copy = unserialize($_COOKIE["Array"]);	
}
$arr = array("first"=>"String", "second"=>10, "third"=>true);
$str = serialize($arr);
setcookie("Array", $str);
?>
<html>
<head>
	<title>Сериализация</title>
	<meta charset="utf-8" />
</head>
<body>
<?php
if(isset($copy))
{
	echo "Массив, прочитанный из куки, после десериализации:<br />";
	print_r($copy);
	echo "<br />";
}
echo "Массив до сериализации:<br />";
var_dump($arr);
echo "<br />Массив после сериализации:<br />".$str;
?>
<br />
<a href="serialize.php?del=1">Очистить куки</a>
 <br />
<a href="serialize.php">Перейти на страницу</a>
</body>
</html>