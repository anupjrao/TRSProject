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
	$tid = $_POST["tid"];
	mysqli_query($conn,"delete from transaction where tid='$tid'");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META http-equiv="refresh" content="5;Frontpage.php">
<title>Redirecting</title>
</head>

<body>
Redirecting...
</body>
</html>