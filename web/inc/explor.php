<?
/* sOB - Simple Open builing Bot
 *
 * Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
 *
 *  This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
*/
function loader(){

if (! isset($_GET["path"])) {
	$_SESSION["path"] = "../build/";  //hide real filesystem
} else {
	$_SESSION["path"] = $_SESSION["path"] . $_GET['path'];
}
$dir = $_SESSION["path"];


$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
	$files[] = $filename;
}

sort($files);

// "chroot" web users
$skip =array(".", "..", ".git", ".svn");

foreach ($files as $f) {
echo $dir.$f;
	if (in_array($f,$skip)) continue;
	if (is_dir( $dir . $f)) {
echo $f;
		$r .= "<a href=\"?page=explor&path=$f/>$f/</a></br>";
	} else {
		//FIXME
	}

}

return $r;

}

?>
