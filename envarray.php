<?php 

$sum=0;
for($i=1;$i<=100;$i++) {
	$sum=$sum+$i;
}

echo $sum;

$sum=0;
$i=1;
do{
	$sum=$sum+$i;
	$i++;
}
while($i<=100);

echo $sum;
?>