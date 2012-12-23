<?
///Data connection information
$dbserver = "laneworks.cjgvjastiugl.us-east-1.rds.amazonaws.com";
$dbname = "working";
$dbuser = "kinlane";
$dbpassword = "itsallg00d";

$file = file("nasa-earth-art.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//var_dump($file);
//$lines = explode(chr(13),$file[0]);

foreach ($file as $line) 
	{
    		
    $arr = explode(",", $line);
    
    //var_dump($arr);
    
    $Name = mysql_real_escape_string(trim((string)$arr[0]));    
    $Name = str_replace(chr(92), "", $Name);
	$Name = str_replace(chr(34), "", $Name);
	echo $Name . "<br />";
	
	$query = "insert into working.nasa_earth_art (Name) values ('". $Name . "')"; 
	//echo $query . "<br />";
	mysql_connect($dbserver, $dbuser, $dbpassword) or die('Could not connect: ' . mysql_error());
	mysql_select_db($dbname);
	mysql_query($query) or die('Query failed: ' . mysql_error());	        

	}
?>
