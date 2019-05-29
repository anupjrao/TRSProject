<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	session_start();
	 
	if(isset($_SESSION["uname"]))
	{
	}
	else
		echo "<script type=\"text/javascript\">location.href=\"Login.html\"</script>";
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "trs";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	$cat=$_POST['cat'];
	$from=$_POST['From'];
	$to=$_POST['To'];
	$fdot=$_POST['fdot'];
	$tdot=$_POST['tdot'];
	if($fdot && $tdot)
	{
	$sql = "select m.v_id,m.source,m.dest,v.seats_av,m.dot,m.timeT,m.price from mvatt m, vehicle v where m.v_id=v.v_id AND (v.type = '$cat') AND (m.source ='$from') AND (m.dest='$to') AND (m.dot between '$fdot' and '$tdot')";
	}
	else
	{
		$sql = "select m.v_id,m.source,m.dest,v.seats_av,m.dot,m.timeT,m.price from mvatt m, vehicle v where m.v_id=v.v_id AND (v.type = '$cat') AND (m.source ='$from') AND (m.dest='$to')";
	}
	$result=mysqli_query($conn,$sql);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Tickets</title>
<link href="BookingRes.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
<div id="header">Travel Reservation System</div>
<form method="post" action="redirection.php">

<?php
$count = 0;
echo "<table id =t1>";
 echo "<tr><th>Vehicle ID</th><th>From</th><th>To</th><th>Seats Available</th><th>Date</th><th>Time</th><th>Price</th><th>Select</th></tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr><td>".$row['v_id']."</td>"."<td>".$row['source']."</td>"."<td>".$row['dest']."</td>"."<td>".$row['seats_av']."</td>"."<td>".$row['dot']."</td>"."<td>".$row['timeT']."</td>"."<td>".$row['price']."<td>"."<input type=\"radio\" name=\"vsel\" value=\"$row[v_id]\"/>"."</td>"."</td>"."</tr>";
$count++;
}
echo '</table>';
echo '<div id="footer"><input id ="bt1" type="submit" value="submit" /></div>';
echo "</br >";
echo ("Results found: " .$count);
if($count ==0)
{
	echo "</br >";
	echo 'No results found '.'<a href="Booking.php">click here</a>'. ' to be redirected';
}
?>

</form>
</div>
</body>
</html>