<?php 
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "trs";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	//Redirection for seat selection
	if(isset($_POST['vsel']))
	{
		$vsel = $_POST['vsel'];
		$result = mysqli_query($conn,"select dot from mvatt where v_id='$vsel';");
		$result = mysqli_fetch_array($result);
		$dot = $result['dot']; 	
		$vtype = mysqli_query($conn,"select type from vehicle where v_id='$vsel';");
		$result = mysqli_fetch_array($vtype);
		$type = $result['type'];
		if($type=="Airways" || $type=="Railways")
		{
			header('Location:railair.php?type=Airways&vsel='.$vsel.'&dot='.$dot);
		}
		if($type=="Roadways")
		{
			header('Location:BusSeats.php?type=Roadways&vsel='.$vsel.'&dot='.$dot);
		}
	}
	//Logout redirection
	if(isset($_GET['Logout']))
	{
		$logout=$_GET['Logout'];
		if($logout==true)
		{
			header('Location: Startpage.html');
		}
	}
	//Redirection for no seats found
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Redirecting...</title>
</head>

<body>
</body>
</html>