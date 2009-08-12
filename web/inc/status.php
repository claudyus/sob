<?
function status(){

	$r = file ("../log/STATUS");
	return $r[0].' since '.$r[1];
}
?>
