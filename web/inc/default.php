<?

function loader(){

//FIXME$r = "Explore the <a href=\"?page=explor\">build_dir</a> <br>";
$r = "Check compile errors <a href=\"?page=errors\">here</a> <br>";
$r .= "Here follow the complete log files: <br>";

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

return $r;
}
?>
