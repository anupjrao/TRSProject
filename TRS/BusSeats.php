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
	$vid = $_GET['vsel'];
	$type = $_GET['type'];
	$dot = $_GET['dot'];
	$sql = "SELECT seat_no from sseats where v_id ='$vid'";
	$result=mysqli_query($conn,$sql);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select Seats</title>
<link href="SeatStyling.css" rel="stylesheet" type="text/css">
</head>

<body><br>
<div id="container">
<div id="header">Select seats</div>
<div id="body">
<form action="finalize.php" method="post">
<input id="1" type="checkbox" name="slist[]" value="1" class="seat"/>&nbsp;<input id="2" type="checkbox" name="slist[]" value="2" class="seat"/><br/>
<input id="3" type="checkbox" name="slist[]" value="3"class="seat" />&nbsp;<input id="4" type="checkbox" name="slist[]" value="4"class="seat" /><br/>
<input id="5" type="checkbox" name="slist[]" value="5" class="seat"/>&nbsp;<input id="6" type="checkbox" name="slist[]" value="6"class="seat" /><br/>
<input id="7" type="checkbox" name="slist[]" value="7" class="seat" />&nbsp;<input id="8" type="checkbox" name="slist[]" value="8" class="seat"/><br/>
<input id="9" type="checkbox" name="slist[]" value="9" class="seat"/>&nbsp;<input id="9" type="checkbox" name="slist[]" value="10" class="seat"/><br/>
<input id="11" type="checkbox" name="slist[]" value="11" class="seat"/>&nbsp;<input id="10" type="checkbox" name="slist[]" value="12" class="seat"/><br/>
<input id="13" type="checkbox" name="slist[]" value="13" class="seat"/>&nbsp;<input id="14" type="checkbox" name="slist[]" value="14" class="seat"/><br/>
<input id="15" type="checkbox" name="slist[]" value="15" class="seat" /><br/>
<input type="text" value ="<?php echo $vid ?>" hidden name="vid"/>
<input type="hidden" value = "<?php echo $dot ?>" name="dot"/>
<input id="bt1"  type="submit" name="submit" value="Confirm" />
</form>
<img src="Resources/map.png"/>
</div>
</div>
</body>
</html>

<?php 
$seats= array();
$i=0;
while($row = mysqli_fetch_array($result))
{
	$seats[$i] = $row['seat_no'];
	$i++;
}
$cnt = count($seats);
for($i=0;$i<$cnt;$i++)
{
	if(isset($seats[$i]))
	{
		echo '<script type="text/javascript">document.getElementById('.$seats[$i].').disabled=true;</script>';	
	}
}