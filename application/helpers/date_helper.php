<?php 
function thaiDate($date="", $sep="-")
{
	if($date =="")
	{
		$date = date("Y".$sep."m".$sep."d H:i:s");
	}
	$date = date("d".$sep."m".$sep."y H:i:s", strtotime($date));
	if($date < "02-01-1970 07:00:00")
	{
		$date = "";
	}
	return $date;
}

function NOW()
{
	return date("Y-m-d H:i:s");	
}

?>