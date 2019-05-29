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
	$usrname = $_SESSION["uname"];
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	$eui = mysqli_query($conn, "SELECT user_id FROM login WHERE user_name ='$usrname'");
	$result = mysqli_fetch_array($eui);
	$eui = $result['user_id'];
	$sql = "CALL SelTick('$eui');";
	$result=mysqli_query($conn,$sql);



	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reservations</title>
<link href="ticketcheck.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="container">
<div id="header"></div>
<div id="body">
<form action="cancel.php" method="post">
<table>
<?PHP 
echo "<tr><th>User id</th><th>Seat no.</th><th>Vehicle ID</th><th>Date of Travel</th><th>Time</th><th>Price</th><th>Transaction</th><th>Cancel</th></tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr><td>".$row['u_id']."</td>"."<td>".$row['seat_no']."</td>"."<td>".$row['v_id']."</td>"."<td>".$row['dot']."</td>"."<td>".$row['timeT']."</td>"."<td>".$row['price']."</td>"."<td>".$row['tid']."</td>"."<td>"."<input type=\"radio\" name=\"tid\" value=\"$row[tid]\"/>"."</td>"."</tr>";

}
?>
</table>
<div id="footer"><input id ="bt1" type="submit" value="submit" /></div>
</form>
</div>
</div>
</body>
</html>