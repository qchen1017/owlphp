<html>
<head><title>Frank's Auto Parts - Order Results</title><head>


	<body>
		<h1>Frank's Auto Parts</h1>
		<h2>Order Results</h2>
		<br>
		<?php
		date_default_timezone_set("PRC");
		echo "<p> order processed at ";
		$date=date('Y/m/d H:i');
		echo $date;
		echo "<p>";
		//create short variable names
		$tireqty=$_POST['tireqty'];
		$oilqty=$_POST['oilqty'];
		$sparkqty=$_POST['sparkqty'];
		$address=$_POST['address'];
		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
		$totalqty=$tireqty+$oilqty+$sparkqty;

		if ($totalqty==0) {
			echo "you didn't order anything on previous page";
			exit;
			}
		echo "you have ordered ";
		echo $tireqty+$oilqty+$sparkqty." items <br />";
		echo "<br />";
		echo "Tire :".$tireqty."<br />";
		echo "Oil :".$oilqty."<br />";
		echo "Spark :".$sparkqty."<br />";
		echo "Address:".$address."<br />";
		echo "<br />";
		
		$total=0.00;
		define('TIREPRICE',100);
		define('OILPRICE',10);
		define('SPARKPRICE',4);

		$total=$tireqty*TIREPRICE
				+$oilqty*OILPRICE
				+$sparkqty*SPARKPRICE;

		echo "Subtotal : $" . number_format($total,2) . "<br />";
		$taxrate=0.10;
		$total=$total*(1+$taxrate);
		echo "Total including tax :$".number_format($total,2)."<br />";		
	
		$outputstring=$date."\t".$tireqty." tires \t".$oilqty." oils \t".$sparkqty." sparks plugs\t\$".$total."\t".$address."\n";
		
		@ $fp=fopen("$DOCUMENT_ROOT/order.txt", 'a');
		flock($fp, LOCK_EX);
		if(!$fp){
			echo "<p><strong>Your order could not be processed this time,please try another time</strong><p>";
			exit;
		}
		fwrite($fp, $outputstring,strlen($outputstring));
		flock($fp,LOCK_UN);
		fclose($fp);

		?>


	</body>	
</html>
