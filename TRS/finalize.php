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
	$vid = $_POST['vid'];
	$usrname = $_SESSION["uname"];
	//USER ID RETRIEVAL
	$eui = mysqli_query($conn, "SELECT user_id FROM login WHERE user_name ='$usrname'");
	$result = mysqli_fetch_array($eui);
	$eui = $result['user_id'];
	//TIME RETRIEVAL AND PRICE
	$tandp = mysqli_query($conn, "select timeT, price from mvatt where v_id='$vid' ");
	$result = mysqli_fetch_array($tandp);
	$dot = $_POST['dot'];
	$time = $result['timeT'];
	$price = $result['price'];	
	if(!empty($_POST['slist'])) {
    foreach($_POST['slist'] as $sid) {
			$tid =$vid.$sid;
			$sql = "INSERT INTO transaction VALUES ('$eui', '$vid', '$sid', '$dot', '$time','$tid','$price');";
            mysqli_query($conn, $sql);
			
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finalize Booking</title>
<link href="finalize.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
    <div id="body">
    	<form action="Payment.html">
    	Credit card number: <input type="text" id="ccno" /><br /><br />
        Credit card CVV no: <input type="text" id="cvv"/><br />
       <div id="footer"><input id="bt1"type="submit" /></div>
        </form>     
    </div>
</div>

</body>
</html>