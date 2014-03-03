<?php

$type= ($_GET['type']) ?: "json";
$type = strtoupper($type);

# PINCODE
$pin = $_GET['pincode'];

# LOCATION
$location = ($_GET['location']) ? " and OFFICENAME like '".$_GET['location']."%' " : "";

$ RECORDS LIMIT
$limit = ($_GET['limit'])?:"100";

# DB CONNECTION
$con=mysql_connect("xxxxxx", "xxxxx", "xxxxxxxxx") OR DIE (mysql_error());
mysql_select_db ("xxxxxxxxx",$con) OR DIE ("Unable to select db".mysql_error());
$query = "SELECT * FROM postpin where PINCODE=".$pin.$location." order by PINCODE,OFFICENAME limit ".$limit; 


$sql= @mysql_query($query);

$ FIND NUMBER OF RECORDS
$num_rows = mysql_num_rows($sql);


if ($type == 'JSON'){
	$results = array("Records"=>154724,"Matched"=>$num_rows,"Fields"=>array('OFFICENAME','TALUK','DISTRICTNAME','STATENAME','PINCODE'));
	$i=0;
	while($row = mysql_fetch_array($sql))
	{
	   $results["data"][$i] = array(
	       $row['OFFICENAME'],
	      $row['TALUK'],
	      $row['DISTRICTNAME'],
	      $row['STATENAME'],
	      $row['PINCODE']
	      
	   );
	   $i++;
	}
	$json = json_encode($results);
	# 	Forceable Header of JSON
	#	header('Content-type: text/json');
	print $json;
}else if ($type =='CSV'){
	
	$results = "'OFFICENAME','TALUK','DISTRICTNAME','STATENAME','PINCODE'\n";
	while($row = mysql_fetch_array($sql))
	{
		$results .= "'".$row['OFFICENAME']."','". $row['TALUK']."','". $row['DISTRICTNAME']."','". $row['STATENAME']."','". $row['PINCODE']. "'\n";
	}
	echo nl2br($results);
}else{


	$XML= '<?xml version="1.0" encoding="UTF-8"?>';
	$XML .= '<Pincodelist>';
	while($row = mysql_fetch_array($sql))
	{	
	$XML .= '<Pincode id="'.$row['PINCODE'].'">';
	$XML .= '<OFFICENAME>'.$row['OFFICENAME'].'</OFFICENAME>';
	$XML .= '<TALUK>'.$row['TALUK'].'</TALUK>';
	$XML .= '<DISTRICTNAME>'.$row['DISTRICTNAME'].'</DISTRICTNAME>';
	$XML .= '<STATENAME>'.$row['STATENAME'].'</STATENAME>';
	$XML .= '</Pincode>';
	}
	$XML .= '</Pincodelist>';
	
	header('Content-type: text/xml');
	print $XML;
}
?>
