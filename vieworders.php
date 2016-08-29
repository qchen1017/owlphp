<?php
	//create short varible name
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
	<tilte>Frank's Auto Parts - Customer Orders</title>
</head>
<body>
<?php
	@ $fp=fopen("$DOCUMENT_ROOT/order.txt", rb);
	if(!$fp){
		echo "<p><strong>The order cannot be viewed at this time, please try later</strong><p>";
		exit;
	}
while (!feof($fp)) {
	$order=fgets($fp,999);
	echo $order."<br />";
}
fclose($fp);
?>
</body>

</html>