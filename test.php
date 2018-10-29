
   <?php
	$jsondata = file_get_contents('http://localhost/Module2/displayData.php');
	$arr = json_decode($jsondata);
		foreach($arr as $a)
		{
		echo $a->list."\t".$a->todoDate."</br>";
		}
?>

<!--
echo "running";
//$json_string = 'http://localhost/Module2/displayData.php';

$jsondata = file_get_contents('http://localhost/Module2/displayData.php');

//$obj = json_decode($jsondata,true);
$arr = json_decode($jsondata);

echo $arr[0]->list."<br>";
foreach($arr as $a)
{
echo $a->list;
}
//print_r($obj);
//echo $obj[0]['list'];
//echo $arr[0]->name ."";
/*
$characters = json_decode($jsondata); // decode the JSON feed

echo $characters[0]->list ;

foreach ($characters as $character) {
	echo $character->list . '<br>';
}

?>
-->
