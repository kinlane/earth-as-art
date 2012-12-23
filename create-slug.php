<?
///Data connection information
$dbserver = "laneworks.cjgvjastiugl.us-east-1.rds.amazonaws.com";
$dbname = "working";
$dbuser = "kinlane";
$dbpassword = "itsallg00d";

mysql_connect($dbserver, $dbuser, $dbpassword) or die('Could not connect: ' . mysql_error());
mysql_select_db($dbname);

$query = "SELECT ID,Name FROM working.nasa_earth_art order by Name";
//echo $query . "<br />";
$nasalist = mysql_query($query) or die('Query failed: ' . mysql_error());	

if($nasalist && mysql_num_rows($nasalist))
	{	
	while ($nasa = mysql_fetch_assoc($nasalist))
		{
		$ID = $nasa['ID'];
		$Name = $nasa['Name'];
		
		$Plug = strtolower($Name);
		$Plug = str_replace(" ", "-", $Plug);
		
		echo $Name . " - " . $Plug . "<br />";
		
		$query = "UPDATE working.nasa_earth_art SET Plug = '" . $Plug . "' WHERE ID = " . $ID;
		//echo $query . "<br />";
		mysql_query($query) or die('Query failed: ' . mysql_error());			
		
		}
	}
?>	