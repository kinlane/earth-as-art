<?php
///Data connection information
$dbserver = "laneworks.cjgvjastiugl.us-east-1.rds.amazonaws.com";
$dbname = "working";
$dbuser = "kinlane";
$dbpassword = "itsallg00d";

mysql_connect($dbserver, $dbuser, $dbpassword) or die('Could not connect: ' . mysql_error());
mysql_select_db($dbname);

$Photos['photo'] = array();

$query = "SELECT ID,Name,Plug,Region,Details FROM working.nasa_earth_art order by Name";
//echo $query . "<br />";
$nasalist = mysql_query($query) or die('Query failed: ' . mysql_error());	

if($nasalist && mysql_num_rows($nasalist))
	{
	?>
	<?php
	$ImageCount = 1;	
	while ($nasa = mysql_fetch_assoc($nasalist))
		{
		$ID = $nasa['ID'];
		$Name = $nasa['Name'];
		$Plug = $nasa['Plug'];
		$Region = $nasa['Region'];
		$Details = $nasa['Details'];
		$Details = str_replace(chr(146),chr(39),$Details);
				
		$ImagePath = "images/" . $Plug . ".jpeg";

		$Photo = array();

		$Photo['name'] = $Name;
		$Photo['plug'] = $Plug;
		$Photo['region'] = $Region;
		$Photo['details'] = $Details;
		$Photo['imagepath'] = $ImagePath;
		
		array_push($Photos['photo'], $Photo);
		

		}?>
	<?php
	}
$ReturnPhotos = json_encode($Photos);
echo $ReturnPhotos;
?>