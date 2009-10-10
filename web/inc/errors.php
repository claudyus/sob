<?

function loader(){

$r = "";

$dir = "../build_dir/";
$dh  = opendir($dir);
if ($dh === FALSE) {
	$r .= "Error: no build dir\n";
}
while (false !== ($subdir = readdir($dh))) {
	$subs[] = $subdir;
}
//sort the subs targets
sort($subs);

$skip =array(".", "..");

foreach ($subs as $f) {
	if (in_array($f,$skip)) continue;
	$r .= "<h3>$f</h3>\n";

	$log_dir = $dir.$f."/logs/";

	//recupera tutti i file che contengono errore
	$shell="";
	exec("grep -inr 'make\[.\].*Error 2' $log_dir/* |  cut -f 1 -d : | sort | uniq", $shell);

	foreach ($shell as $o) {
		$r .= "<a href=\"?page=errors&target=$f&file=$o\">$o</a> <br>\n";
	}
}

if (isset($_GET["file"]) && isset($_GET["target"])) {
	$fname = $_GET["file"];
	$file_ctx = file($fname);
	if ($file_ctx !== FALSE) {
		$r .="<pre>\n";
		foreach ($file_ctx as $tmp)
			$r .= $tmp;
		$r .= "</pre>\n";
	} else {
		$r .= "File not found:". $_GET["file"];
	}
}

return $r;
}
?>
