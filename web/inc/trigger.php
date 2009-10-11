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


if (isset($_GET["target"])) {
	exec("echo ".$_GET["target"]." >> /tmp/sob-planned");
	$r .= "Target ".$_GET["target"]." compilation will start in less than 5 mins<br><br>";
}

$r .="Select target to re-run:<br>";


exec("ls ../conf/*.conf -1 | cut -f 3 -d  / | cut -f 1 -d .", $shell);

foreach ($shell as $o) {
	$r .= "<a href=\"?page=trigger&target=$o\">$o</a><br>\n";
}

return $r;
}
?>
