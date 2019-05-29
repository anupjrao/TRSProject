<?php
	session_start();
	 
	if(isset($_SESSION["uname"]))
	{
	}
	else
		echo "<script type=\"text/javascript\">location.href=\"Login.html\"</script>";

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Reservation System</title>
<link href="FrontPage.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="Container">
    <div id="Header">
    	<a href="redirection.php?Logout=True">Logout</a>
    </div>
    <div id="Body">
    	<div id="boxes">
			<a href="booking.php"><div id="left">Book Tickets<img src="Resources/LBanner.png" /></div></a> <a href="ticketcheck.php"><div id="mid">Check Reservations<img src="Resources/RBanner.png" /></div></a>
        </div>
    </div>
</div>
</body>
</html>