<!DOCTYPE html>
<html>
<body>

<?php
	date_default_timezone_set("Singapore");
	$now=date("y-m-d"." "."h:i:s");

$date1=date_create($now);
$date2=date_create("15-05-25 11:12:10pm");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");
?>

</body>
</html>