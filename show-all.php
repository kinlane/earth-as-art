<?php
///Data connection information
$dbserver = "laneworks.cjgvjastiugl.us-east-1.rds.amazonaws.com";
$dbname = "working";
$dbuser = "kinlane";
$dbpassword = "itsallg00d";

mysql_connect($dbserver, $dbuser, $dbpassword) or die('Could not connect: ' . mysql_error());
mysql_select_db($dbname);

$query = "SELECT ID,Name,Plug FROM working.nasa_earth_art order by Name";
//echo $query . "<br />";
$nasalist = mysql_query($query) or die('Query failed: ' . mysql_error());	

if($nasalist && mysql_num_rows($nasalist))
	{
	?>
	<center>
	<?php
	$ImageCount = 1;	
	while ($nasa = mysql_fetch_assoc($nasalist))
		{
		$ID = $nasa['ID'];
		$Name = $nasa['Name'];
		$Plug = $nasa['Plug'];
		
		$ImagePath = "images/" . $Plug . ".jpeg";
		
		?>
		<img src="<?php echo $ImagePath; ?>" width="450" />
		<?php
		if($ImageCount==3)
			{
			$ImageCount = 1;	
			?><br /><?php
			$ImageCount++;
			}
		}?>
	</center>
	<?php
	}
?>	