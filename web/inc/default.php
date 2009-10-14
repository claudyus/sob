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

//FIXME$r = "Explore the <a href=\"?page=explor\">build_dir</a> <br>";
$r = "Check compile errors <a href=\"?page=errors\">here</a> <br>";
$r .= "Trig a bot <a href=\"?page=trigger\">here</a> <br>";
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
