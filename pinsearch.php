<?php

mysql_connect("xxxxxxx", "xxxxxxx", "xxxx") or die(mysql_error());
mysql_select_db("xxxxxxxxx") or die(mysql_error());

$type = (@$_GET['type']) ?:"pin";

if ($type == "pin"){
	$pin = (@$_GET['pin']) ?:"";
	$query = "SELECT * FROM postpin where PINCODE=".$pin." order by PINCODE,OFFICENAME"; 
	$s = $pin;
}else if($type == "taluk"){
	$taluk = (@$_GET['taluk']) ?:"-";
	$query = "SELECT * FROM postpin where TALUK like '".$taluk."%' order by PINCODE,OFFICENAME limit 100"; 
	$s = $taluk;
}else{
	$loc = (@$_GET['location']) ?:"-";
	$query = "SELECT * FROM postpin where OFFICENAME like '".$loc."%' order by PINCODE,OFFICENAME limit 100"; 
	$s = $loc;
}


$result = @mysql_query($query);
$num_rows = mysql_num_rows($result);
?>
<tr><td colspan=2>

            <div class="alert alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php
echo "<strong>".$num_rows."</strong> Record(s) matched (Total :154724)";
?>
            </div>

</td></tr>
<?php
	echo "<tr class='btn-warning'><th><strong>OFFICE NAME</strong> <div class='col-lg-4'>Taluk/District/State</div></th><th>PINCODE</th></tr>";

while($row = @mysql_fetch_array( $result )) {
	echo "<tr><td><strong>".$row['OFFICENAME']."</strong> <div class='col-lg-4'>".$row['TALUK']."<br>".$row['DISTRICTNAME']."<br>".$row['STATENAME']."</div></td><td>".$row['PINCODE']."</td></tr>";
}
?>

