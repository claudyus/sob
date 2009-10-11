<?

function loader(){


if (isset($_GET["target"])) {
	exec("echo $_GET[\"target\"] >> /tmp/sob-planned");
	$r .= "Target $_GET[\"target\"] compilation will start in less than 5 min";
}

$r .="Select target to re-run:<br>";

exec("ls ../conf/*.conf -1 | cut -f 3 -d  / | cut -f 1 -d .", $shell);

foreach ($shell as $o) {
	$r .= "<a href=\"?page=trigger&target=$o\">$o</a><br>\n";
}

}
?>
