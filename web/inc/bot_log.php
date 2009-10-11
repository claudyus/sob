<? 

function loader(){

$dir = "../log";
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
	$files[] = $filename;
}

sort($files);

$skip =array(".", "..", "STATUS");

foreach ($files as $f) {
	if (in_array($f,$skip)) continue;
	$r .= "<a href=\"?page=detail&file=$f\">$f</a></br>";
}

}
?>
